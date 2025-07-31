<template>
    <section class="News pf cyber-razor-top fg-white p-3">
        <div class="container">
            <div class="content ">
                <div class="text">
                    <h1>Новини</h1>
                </div>
                <div class="grid-items">
                    <div class="item" :class="{ 'first-item': index === 0 }" v-for="(item, index) in news"
                        :key="item.id">
                        <div class="backdrop">
                            <img :src="`/storage/${item.banner}`" alt="">
                        </div>
                        <div class="text-content">
                            <h1>{{ item.name }}</h1>
                        </div>
                    </div>
                </div>
                <router-link to="/news">
                    <button class="cyber-button-small bg-red fg-white">
                        Більше новин
                        <span class="glitchtext">Вперед</span>
                        <span class="tag fg-white">AW</span>
                    </button>
                </router-link>
            </div>
        </div>
    </section>
</template>

<script>
import { computed } from 'vue'

export default {
    name: 'News',
    setup() {
        const news = computed(() => window.__APP_DATA__?.news || []);

        return {
            news
        }
    }
}
</script>
