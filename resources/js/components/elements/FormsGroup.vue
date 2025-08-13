<template>
    <section class="FormsGroup pf cyber-razor-top bg-dark fg-white p-3">
        <div class="container">
            <div class="content ">
                <div class="text">
                    <h1>Заявки на участь</h1>
                    <p>
                        Ви можете подати свою заявку на виступ тут:
                    </p>
                </div>
                <div class="group-items">
                    <div class="item" v-for="(item, index) in forms" :key="item.id">
                        <div class="backdrop"></div>
                        <div class="el-text">
                            <h1 v-html="formatText(item.title)"></h1>
                            <a :href="item.link" style="margin-top: 10px;" target="_blank">
                                <button class="cyber-button-small bg-blue fg-white">
                                    Перейти
                                    <span class="glitchtext">Вперед</span>
                                    <span class="tag fg-white">AW</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <img class="back_img" src="/storage/source/persone/Picsart_25-03-28_21-58-08-094.png" alt="">
        </div>
    </section>
</template>

<script>
import { computed } from 'vue'

export default {
    name: 'FormsGroup',
    setup() {
        const forms = computed(() => window.__APP_DATA__?.FormsParticipantsCategory || []);

        const formatText = (text) => {
            if (!text) return '';
            return text.trim().replace(/\s+/g, '<br>');
        };

        return {
            forms,
            formatText
        }
    }
}
</script>
