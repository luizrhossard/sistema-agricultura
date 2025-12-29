/**
 * Sistema de Agricultura - App.js
 * Funções gerais de JavaScript
 */

const APP = {
    /**
     * Inicializar a aplicação
     */
    init() {
        this.attachEventListeners();
        console.log("✅ Sistema de Agricultura carregado");
    },

    /**
     * Anexar event listeners
     */
    attachEventListeners() {
        // Menu hambúrguer
        const hamburger = document.getElementById("navHamburger");
        const navMenu = document.getElementById("navMenu");

        if (hamburger && navMenu) {
            hamburger.addEventListener("click", () => {
                navMenu.classList.toggle("active");
            });

            // Fechar menu ao clicar em um link
            navMenu.querySelectorAll("a").forEach((link) => {
                link.addEventListener("click", () => {
                    navMenu.classList.remove("active");
                });
            });
        }
    },

    /**
     * Mostrar alertas na tela
     * @param {string} message - Mensagem a mostrar
     * @param {string} type - Tipo: success, error, info, warning
     */
    showAlert(message, type = "info") {
        const container = document.getElementById("alertContainer");

        if (!container) return;

        const alert = document.createElement("div");
        alert.className = `alert alert-${type}`;
        alert.innerHTML = `
            <div class="alert-content">
                ${message}
            </div>
            <button class="alert-close" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        `;

        container.appendChild(alert);

        // Remover automaticamente após 5 segundos
        setTimeout(() => {
            alert.remove();
        }, 5000);
    },

    /**
     * Fazer requisição fetch com tratamento de erro
     * @param {string} url - URL da requisição
     * @param {object} options - Opções do fetch
     */
    async fetch(url, options = {}) {
        try {
            const response = await fetch(url, {
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    )?.content,
                    ...options.headers,
                },
                ...options,
            });

            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }

            return await response.json();
        } catch (error) {
            console.error("Erro na requisição:", error);
            this.showAlert(`❌ Erro: ${error.message}`, "error");
            throw error;
        }
    },

    /**
     * Formatar data para português
     * @param {string} dateString - Data em string
     */
    formatDate(dateString) {
        return new Date(dateString).toLocaleString("pt-BR", {
            year: "numeric",
            month: "2-digit",
            day: "2-digit",
            hour: "2-digit",
            minute: "2-digit",
        });
    },
};

// Inicializar quando o DOM estiver pronto
document.addEventListener("DOMContentLoaded", () => {
    APP.init();
});
