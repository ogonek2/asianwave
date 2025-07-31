<template>
    <section class="About pf cyber-razor-top bg-dark fg-white p-3">
        <div class="container">
            <img src="/storage/source/persone/Picsart_25-03-28_21-56-27-651.png" alt="">
            <div class="content ">
                <div class="text">
                    <h1>Про нас</h1>
                    <p>
                        Це дводенний фестиваль для поціновувачів аніме та
                        косплею, азіатської культури та гік тусовок. Простір, де
                        можна зустрітись з цікавими людьми, поринути в атмосферу
                        свята та креативу.<br><br>

                        Пропонуємо разом з нами насолодитися насиченою
                        програмою нашого фестивалю та гарно провести ці весняні
                        вихідні.<br><br>

                        На вас чекає косплей дефіле, вокальні виступи, к-поп кавер
                        денс, настільні ігри, фотозони, памп та аркадні автомати,
                        ярмарка, жива музика, дискотека під улюблені треки, безліч
                        цікавих конкурсів та крутих призів, та ще багато всього.
                    </p>
                </div>
                <div class="buttons">
                    <a href="https://ottry.com/events/asian-wave-2025" target="_blank">
                        <button class="cyber-button-small bg-blue fg-white">
                            КУПИТИ БІЛЕТ
                            <span class="glitchtext">Вперед</span>
                            <span class="tag fg-white">AW</span>
                        </button>
                    </a>
                    <router-link to="/questionnaire">
                        <button class="cyber-button-small bg-red fg-white">
                            Подати заявку
                            <span class="glitchtext">Вперед</span>
                            <span class="tag fg-white">AW</span>
                        </button>
                    </router-link>
                </div>
            </div>
        </div>
    </section>
</template>


<script>
export default {
    name: 'About'
}
</script>
