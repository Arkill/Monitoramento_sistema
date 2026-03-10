/* ================================================================
   PALETA DE CORES
   ================================================================ */
const COR = {
    green:  { bg: "linear-gradient(90deg,#27a855,#3ddc84)", shadow: "0 0 10px rgba(61,220,132,0.35)",  text: "#3ddc84"  },
    yellow: { bg: "linear-gradient(90deg,#d4a017,#f5c542)", shadow: "0 0 10px rgba(245,197,66,0.35)", text: "#f5c542"  },
    orange: { bg: "linear-gradient(90deg,#c46800,#ff9900)", shadow: "0 0 10px rgba(255,153,0,0.35)",  text: "#ffaa33"  },
    red:    { bg: "linear-gradient(90deg,#c9303a,#ff4e5b)", shadow: "0 0 10px rgba(255,78,91,0.40)",  text: "#ff6b75"  },
};

function corPorPercentual(pct) {
    if (pct >= 80) return COR.red;
    if (pct >= 60) return COR.orange;
    if (pct >= 40) return COR.yellow;
    return COR.green;
}

function aplicarCor(barra, cor) {
    barra.classList.remove("bar-green", "bar-yellow", "bar-orange", "bar-red");
    barra.style.background = cor.bg;
    barra.style.boxShadow  = cor.shadow;
}

/* ================================================================
   INDICADOR DE ATUALIZAÇÃO
   ================================================================ */
function mostrarAtualizando() {
    const el = document.getElementById("update-indicator");
    if (el) el.style.display = "flex";
}

function esconderAtualizando() {
    const el = document.getElementById("update-indicator");
    if (el) el.style.display = "none";
}

/* ================================================================
   TIMESTAMP DE ÚLTIMA ATUALIZAÇÃO
   ================================================================ */
function registrarUltimaAtualizacao() {
    const agora = new Date();
    const hh  = String(agora.getHours()).padStart(2, "0");
    const mm  = String(agora.getMinutes()).padStart(2, "0");
    const ss  = String(agora.getSeconds()).padStart(2, "0");
    const dia = agora.toLocaleDateString("pt-BR", { day: "2-digit", month: "2-digit", year: "numeric" });

    const el = document.getElementById("ultimo-update");
    if (el) el.textContent = `${hh}:${mm}:${ss} — ${dia}`;

    resetarContadorReload();
}

/* ================================================================
   STATUS DE CONEXÃO
   ================================================================ */
function setStatusOnline() {
    const el = document.getElementById("status-conexao");
    if (!el) return;
    el.textContent = "● ONLINE";
    el.className   = "status-ok";
}

function setStatusOffline() {
    const el = document.getElementById("status-conexao");
    if (!el) return;
    el.textContent = "● OFFLINE";
    el.className   = "status-erro";
}

/* ================================================================
   AUTO-RELOAD  (padrão: 10 minutos sem resposta)
   ================================================================ */
const RELOAD_SEGUNDOS = 10 * 60;
let reloadTimer    = RELOAD_SEGUNDOS;
let reloadInterval = null;

function resetarContadorReload() {
    reloadTimer = RELOAD_SEGUNDOS;
}

function iniciarAutoReload() {
    if (reloadInterval) clearInterval(reloadInterval);

    reloadInterval = setInterval(() => {
        reloadTimer--;

        const min = String(Math.floor(reloadTimer / 60)).padStart(2, "0");
        const sec = String(reloadTimer % 60).padStart(2, "0");
        const el  = document.getElementById("reload-countdown");
        if (el) el.textContent = `${min}:${sec}`;

        if (reloadTimer <= 0) location.reload();
    }, 1000);
}

/* ================================================================
   CARD OFFLINE / ONLINE
   ================================================================ */
function marcarCardOffline(card) {
    card.classList.add("card-offline");
    card.classList.remove("card-alerta-critico");
    card.removeAttribute("data-alerta");

    card.querySelectorAll(".progress-bar").forEach(b => {
        b.style.width      = "0%";
        b.style.background = "#1a1a2e";
        b.style.boxShadow  = "none";
    });
    card.querySelectorAll(".barra-valor").forEach(t => {
        t.textContent = "---";
        t.style.color = "#3a6070";
    });
}

function marcarCardOnline(card) {
    card.classList.remove("card-offline");
}

/* ================================================================
   BUSCA DE DADOS NA API
   ================================================================ */
let atualizando = false;

async function atualizarDashboard() {

    if (atualizando) return;
    atualizando = true;

    mostrarAtualizando();

    try {

        const response = await fetch("api/api_zabbix.php?nocache=" + Date.now());

        if (!response.ok) throw new Error("HTTP " + response.status);

        const dataRaw = await response.json();

        if (!dataRaw || !dataRaw.result) {
            console.error("Resposta inválida da API");
            setStatusOffline();
            esconderAtualizando();
            atualizando = false;
            return;
        }

        const servidores = processarDados(dataRaw.result);

        atualizarPorNome("SRVLDD2020",                                   servidores["10736"]);
        atualizarPorNome("SRVDGB088 - DB SISTEMAS",                      servidores["10832"]);
        atualizarPorNome("INSTITUTO JC",                                  servidores["10864"]);
        atualizarPorNome("SRVDGB003 - NGINX CTD",                        servidores["10655"]);
        atualizarPorNome("SRVDGB028 - SFCSWEB2 147.1.160.20",            servidores["10751"]);
        atualizarPorNome("SRVDGB029 - 147.1.160.40",                     servidores["10750"]);
        atualizarPorNome("SRVDGB023 - PDA 147.0.0.130",                  servidores["10749"]);
        atualizarPorNome("SRVDGB008 - 147.1.0.116",                      servidores["10760"]);
        atualizarPorNome("SRVDGB026 - SCRPSERVER-CELULAR 147.1.0.149",   servidores["10743"]);
        atualizarPorNome("SRVDGB025",                                     servidores["10742"]);

        setStatusOnline();
        registrarUltimaAtualizacao();

    } catch (error) {

        console.error("Erro ao processar o dashboard:", error);
        setStatusOffline();

    }

    esconderAtualizando();
    atualizando = false;
}

/* ================================================================
   PROCESSAR DADOS DA API
   ================================================================ */
function processarDados(result) {

    const servidores = {};

    result.forEach(item => {

        const hostId = item.hostid;

        if (!servidores[hostId]) {
            servidores[hostId] = { cpu: 0, load: 0, mem: 0, disk: 0, swap: 0 };
        }

        const valor = parseFloat(item.lastvalue);
        if (isNaN(valor)) return;

        if (item.key_ === "system.cpu.util")                              servidores[hostId].cpu  = valor;
        if (item.key_ === "system.cpu.load[all,avg1]")                   servidores[hostId].load = valor;
        if (item.key_.includes("vfs.fs.size") && item.key_.includes("pused")) servidores[hostId].disk = valor;
        if (item.key_ === "vm.memory.size[pavailable]") {
            servidores[hostId].swap = valor;
            servidores[hostId].mem  = 100 - valor;
        }

    });

    return servidores;
}

/* ================================================================
   ATUALIZAR CARD POR NOME
   ================================================================ */
function atualizarPorNome(nomeCabecalho, dados) {

    const cards = document.querySelectorAll(".card");
    let cardEncontrado = null;

    cards.forEach(c => {
        const header = c.querySelector(".card-header");
        if (header && header.innerText.trim() === nomeCabecalho) {
            cardEncontrado = c;
        }
    });

    if (!cardEncontrado) return;

    // Sem dados = servidor offline
    if (!dados) {
        marcarCardOffline(cardEncontrado);
        return;
    }

    marcarCardOnline(cardEncontrado);

    atualizarBarra(cardEncontrado, "cpu-b",   "cpu-v",      dados.cpu);
    atualizarBarra(cardEncontrado, "load-b",  "load-v",     dados.load);
    atualizarBarra(cardEncontrado, "mem-b",   "mem-v",      dados.mem);
    atualizarBarra(cardEncontrado, "disk-b",  "disk-v",     dados.disk);
    atualizarBarra(cardEncontrado, "swap-b",  "swap-value", dados.swap);

    // ── Alertas ──────────────────────────────────────────────
    const mensagensAlerta = [];

    if (dados.cpu  >= 80) mensagensAlerta.push("CPU CRÍTICA");
    if (dados.load >   4) mensagensAlerta.push("CARGA ALTA");
    if (dados.mem  >= 80) mensagensAlerta.push("MEMÓRIA ESGOTADA");
    if (dados.disk >= 80) mensagensAlerta.push("DISCO CHEIO");
    if (dados.swap >= 80) mensagensAlerta.push("POUCA MEMÓRIA DISPONÍVEL");

    if (mensagensAlerta.length > 0) {
        cardEncontrado.classList.add("card-alerta-critico");
        cardEncontrado.setAttribute("data-alerta", "⚠ " + mensagensAlerta.join(" | "));
    } else {
        cardEncontrado.classList.remove("card-alerta-critico");
        cardEncontrado.removeAttribute("data-alerta");
    }
}

/* ================================================================
   ATUALIZAR BARRA INDIVIDUAL
   ================================================================ */
function atualizarBarra(card, classeBarra, classeValor, valor) {

    const barra = card.querySelector("." + classeBarra);
    const texto = card.querySelector("." + classeValor);

    if (!barra || !texto) return;

    const isLoad = classeBarra.includes("load");

    let v = isNaN(valor) ? 0 : parseFloat(valor);
    if (v < 0) v = 0;

    let vFormatado, largura;

    if (isLoad) {
        vFormatado = v.toFixed(3);
        largura    = Math.min(v * 20, 100);
    } else {
        if (v > 100) v = 100;
        vFormatado = v.toFixed(1) + "%";
        largura    = v;
    }

    barra.style.width = largura + "%";

    const cor = corPorPercentual(largura);
    aplicarCor(barra, cor);

    texto.textContent = vFormatado;
    texto.style.color = cor.text;
}

/* ================================================================
   INICIALIZAÇÃO
   ================================================================ */
document.addEventListener("DOMContentLoaded", () => {
    iniciarAutoReload();
    atualizarDashboard();
    setInterval(atualizarDashboard, 5000);
});