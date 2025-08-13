<template>
    <div id="header" class="header" style="padding: 0.5rem 0">
        <nav class="navigator" :class="{ open: isOpen }">
            <div class="burger" @click="toggleMenu" style="padding: 0 2rem;">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <ul style="width: 100%;">
                <li><router-link to="/">ГОЛОВНА</router-link></li>
                <li><router-link to="/about">ІНФОРМАЦІЯ</router-link></li>
                <li><router-link to="/schedule">РОЗКЛАД</router-link></li>
                <li><router-link to="/news">НОВИНИ</router-link></li>
                <li><router-link to="/contacts">КОНТАКТИ ТА ЛОКАЦІЯ</router-link></li>
                <li style="margin-left: auto;">
                    <div class="buttons">
                        <a href="https://ottry.com/events/asian-wave-2025" target="_blank">
                            <button class="cyber-button-small bg-red fg-white">
                                Квиток
                                <span class="glitchtext">Вперед</span>
                                <span class="tag fg-white">AW</span>
                            </button>
                        </a>
                        <router-link to="/questionnaire">
                            <button class="cyber-button-small bg-blue fg-white">
                                Подати заявку
                                <span class="glitchtext">Вперед</span>
                                <span class="tag fg-white">AW</span>
                            </button>
                        </router-link>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'Navigator',
    data() {
        return {
            isOpen: false
        }
    },
    methods: {
        toggleMenu() {
            this.isOpen = !this.isOpen;
        }
    }
}
</script>

<style scoped>
.header {
    background: black;
    color: white;
    padding: 0.5rem 2rem;
    position: relative;
}

.navigator {
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
}

.navigator ul {
    display: flex;
    gap: 20px;
    list-style: none;
    padding-left: 0;
    margin: 0;
}

.navigator .buttons {
    display: flex;
    gap: 10px;
}

/* Burger button */
.burger {
    display: none;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 5px;
    cursor: pointer;
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 30px;
    height: 30px;
    z-index: 2001;
}

.burger div {
    width: 25px;
    height: 3px;
    background: white;
    transform-origin: center;
}

.navigator.open .burger div:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
}

.navigator.open .burger div:nth-child(2) {
    opacity: 0;
}

.navigator.open .burger div:nth-child(3) {
    transform: rotate(-45deg) translate(5px, -5px);
}

/* Responsive */
@media (max-width: 980px) {
    .burger {
        display: flex;
    }

    .navigator ul,
    .navigator .buttons {
        display: none;
        flex-direction: column;
        background: #111;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        z-index: 2000;
        padding: 1rem;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
    }

    .navigator.open ul,
    .navigator.open .buttons {
        display: flex;
    }

    .navigator {
        flex-direction: column;
        align-items: flex-start;
    }

    .navigator .buttons {
        padding-top: 0;
    }
}
</style>
