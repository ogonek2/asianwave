<template>
    <div>
        <Header />
        <News />
        <About />
        <FormsGroup />
        <Partners />
        <Organizers />
        <contacts-section></contacts-section>
    </div>
</template>

<script>
import Header from './elements/Header.vue'
import About from './elements/About.vue'
import FormsGroup from './elements/FormsGroup.vue'
import News from './elements/News.vue';
import Partners from './elements/Partners.vue';
import Organizers from './elements/Organizers.vue';

export default {
    name: 'Home',
    components: {
        Header,
        About,
        FormsGroup,
        News,
        Partners,
        Organizers,
    }
}
</script>