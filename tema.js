/* ============================================================
   ALTERNÂNCIA DE TEMA  —  tema.js
   ============================================================ */

const CHAVE_TEMA = "digiboard-tema";

function aplicarTema(tema) {
    if (tema === "claro") {
        document.body.classList.add("tema-claro");
        const btn = document.getElementById("btn-tema");
        if (btn) btn.textContent = "🌙 Modo Escuro";
    } else {
        document.body.classList.remove("tema-claro");
        const btn = document.getElementById("btn-tema");
        if (btn) btn.textContent = "☀️ Modo Claro";
    }
    localStorage.setItem(CHAVE_TEMA, tema);
}

function alternarTema() {
    const temaAtual = localStorage.getItem(CHAVE_TEMA) || "escuro";
    aplicarTema(temaAtual === "escuro" ? "claro" : "escuro");
}

// Aplica o tema salvo assim que a página carrega
document.addEventListener("DOMContentLoaded", () => {
    const temaSalvo = localStorage.getItem(CHAVE_TEMA) || "escuro";
    aplicarTema(temaSalvo);
});