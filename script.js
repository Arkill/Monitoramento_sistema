// ================================================================
// script.js - VERSÃO FINAL COM PRECISÃO DE DADOS E ESTILO MANTIDO
// ================================================================

async function atualizarDashboard() {
    try {
        // O parâmetro nocache garante que os dados sejam sempre os mais recentes do Zabbix
        const response = await fetch("api-zabbix.php?nocache=" + new Date().getTime());
        const dataRaw = await response.json();

        if (!dataRaw.result) return;

        const servidores = processarDados(dataRaw.result);

        // MAPEAMENTO POR NOME (Deve ser IDENTICO ao texto no <div class="card-header">)
        atualizarPorNome("SRVDGB008 - 147.1.0.116", servidores["10760"]);
        atualizarPorNome("SRVDGB023 - PDA 147.0.0.130", servidores["10749"]);
        atualizarPorNome("SRVDGB029 - 147.1.160.40", servidores["10750"]);
        atualizarPorNome("SRVDGB003 - NGINX CTD", servidores["10655"]);
        atualizarPorNome("SRVDGB024 - 147.1.0.148", servidores["10887"]);
        atualizarPorNome("SRVDGB082 - 147.1.0.100", servidores["10775"]);

    } catch (error) {
        console.error("Erro ao processar o dashboard:", error);
    }
}

function processarDados(result) {
    const servidores = {};

    result.forEach(item => {
        const hostId = item.hostid;
        if (!servidores[hostId]) {
            servidores[hostId] = { cpu: 0, mem: 0, disk: 0, swap: 0 };
        }

        const valor = parseFloat(item.lastvalue);

        // 1. CPU - Captura a utilização real (ex: 3.72%)
        if (item.key_ === "system.cpu.util") {
            servidores[hostId].cpu = valor;
        }

        // 2. CARGA MÉDIA 
        if (item.key_ === "system.cpu.load[all,avg1]") {
            servidores[hostId].load = valor;
        }

        // 2. DISCO - Uso de espaço em disco (pused)
        if (item.key_.includes("vfs.fs.size") && item.key_.includes("pused")) {
            servidores[hostId].disk = valor;
        }

        // 3. MEMÓRIA - Correção para bater com os 14.3% reais do Zabbix
        if (item.key_ === "vm.memory.utilization") {
            servidores[hostId].mem = valor;
        } 

         if (item.key_ === "vm.memory.size[pavailable]") {
            servidores[hostId].swap = valor;  // Aplica o mesmo valor ao SWAP para não ficar 0
        }
    });

    return servidores;
}

function atualizarPorNome(nomeCabecalho, dados) {
    if (!dados) return;
    const cards = document.querySelectorAll(".card");
    let cardEncontrado = null;

    cards.forEach(c => {
        const header = c.querySelector(".card-header");
        if (header && header.innerText.trim() === nomeCabecalho) cardEncontrado = c;
    });

    if (cardEncontrado) {
        atualizarBarra(cardEncontrado, "cpu-b", "cpu-v", dados.cpu);
        atualizarBarra(cardEncontrado, "load-b", "load-v", dados.load);
        atualizarBarra(cardEncontrado, "mem-b", "mem-v", dados.mem);
        atualizarBarra(cardEncontrado, "disk-b", "disk-v", dados.disk);
        atualizarBarra(cardEncontrado, "swap-b", "swap-value", dados.swap);

        let mensagensAlerta = [];
        if (dados.cpu > 90) mensagensAlerta.push("CPU CRÍTICA");
        if (dados.load > 4) mensagensAlerta.push("CARGA ALTA");
        if (dados.mem > 90) mensagensAlerta.push("MEMÓRIA ESGOTADA");
        if (dados.disk > 95) mensagensAlerta.push("DISCO CHEIO");
        if (dados.swap > 80) mensagensAlerta.push("SWAP ALTO");

        if (mensagensAlerta.length > 0) {
            cardEncontrado.classList.add("card-alerta-critico");
            cardEncontrado.setAttribute("data-alerta", "⚠ " + mensagensAlerta.join(" | "));
        } else {
            cardEncontrado.classList.remove("card-alerta-critico");
            cardEncontrado.removeAttribute("data-alerta");
        }
    }
}

function atualizarBarra(card, classeBarra, classeValor, valor) {
    const barra = card.querySelector("." + classeBarra);
    const texto = card.querySelector("." + classeValor);

    if (!barra || !texto) return;

    // Detecta se é Carga Média verificando se a classe contém "load"
    const isLoad = classeBarra.includes("load");
    let v = isNaN(valor) ? 0 : parseFloat(valor);
    if (v < 0) v = 0;

    let vFormatado;
    let larguraBarra;

    if (isLoad) {
        // Lógica para CARGA MÉDIA (0.189)
        vFormatado = v.toFixed(3); // Mostra 3 casas decimais sem o %
        larguraBarra = v * 20;     // Multiplica por 20 para a barra andar (ex: 1.0 de load = 20% da barra)
    } else {
        // Lógica para PORCENTAGENS (CPU, MEM, DISK, SWAP)
        if (v > 100) v = 100;
        vFormatado = v.toFixed(1) + "%"; // Mostra 1 casa decimal com %
        larguraBarra = v;
    }

    if (larguraBarra > 100) larguraBarra = 100;

    // Aplica a largura e o texto
    barra.style.width = larguraBarra + "%";
    texto.innerText = vFormatado;

    // ESTILO MANTIDO: Branco, Negrito e Centralizado
    texto.style.color = "#ffffff";          
    texto.style.fontWeight = "bold";       
    texto.style.textShadow = "1px 1px 2px rgba(0,0,0,0.8)"; 
    texto.style.position = "absolute";
    texto.style.left = "50%";
    texto.style.transform = "translateX(-50%)";
    texto.style.width = "100%";
    texto.style.textAlign = "center";
    texto.style.display = "block";
    texto.style.zIndex = "10";

    // Lógica de Cores (Para Carga, usamos a largura simulada para decidir a cor)
    let checkCor = isLoad ? v * 20 : v;

    if (checkCor >= 80) {
        barra.style.backgroundColor = "#ff4d4d"; // Vermelho
    } else if (checkCor >= 60) {
        barra.style.backgroundColor = "#ff9900"; // Laranja
    } else if (checkCor >= 40) {
        barra.style.backgroundColor = "#ffcc00"; // Amarelo
    } else {
        barra.style.backgroundColor = "#00c851"; // Verde
    }

    // Garante visibilidade mínima
    if (v > 0 && larguraBarra < 5) {
        barra.style.minWidth = "5px"; 
    } else if (v === 0) {
        barra.style.minWidth = "0px";
    }
}

// Inicia a atualização automática
atualizarDashboard();
setInterval(atualizarDashboard, 5000);