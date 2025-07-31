<template>
    <div>
        <FormsGroup />
        <News></News>
    </div>
</template>

<script>
import FormsGroup from './elements/FormsGroup.vue'
import News from './elements/News.vue';

export default {
    name: 'FeedForm',
    components: {
        FormsGroup,
        News,
    }
}
</script>