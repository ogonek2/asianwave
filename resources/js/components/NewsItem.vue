<template>
    <div>
        <section class="News-page-item pf cyber-razor-top bg-dark fg-white p-3">
            <div class="container">
                <div class="content">
                    <div class="news-content" v-if="newsItem">
                        <div class="row row-header">
                            <div class="col-6">
                                <img :src="`/storage/${newsItem.banner}`" :alt="{title}">
                            </div>
                            <div class="col-6">
                                <h1>{{ newsItem.description }}</h1>
                                <p>{{ newsItem.description }}</p>
                            </div>
                        </div>
                        <div class="row row-content">
                            <div class="col-6">
                                <div class="text" v-html="newsItem.content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: 'NewsItem',
    data() {
        return {
            news: (window.__APP_DATA__ && window.__APP_DATA__.news) ? window.__APP_DATA__.news : []
        }
    },
    computed: {
        newsItem() {
            const slug = this.$route && this.$route.params ? this.$route.params.slug : null
            if (!slug) return null
            return this.news.find(n => n && n.url === slug) || null
        },
        title() {
            return this.newsItem ? this.newsItem.name : 'Новина не знайдена'
        }
    }
}
</script>
