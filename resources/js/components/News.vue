<template>
    <div>
        <section class="News-page pf cyber-razor-top bg-dark fg-white p-3">
            <div class="container">
                <div class="content">
                    <div class="news-list-grid">
                        <div class="news-item" :class="{ 'first-item': index === 0 }" v-for="(item, index) in news"
                            :key="item.id">
                            <router-link :to="`/news/${item.url}`">
                                <div class="backdrop">
                                    <img :src="`/storage/${item.banner}`" alt="">
                                </div>
                                <div class="text-content">
                                    <h1>{{ item.name }}</h1>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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