require('./bootstrap');

window.Vue = require('vue').default;

import router from './router';

Vue.component('header-section', require('./components/HeaderSection.vue').default);
Vue.component('navigator-section', require('./components/Navigator.vue').default);
Vue.component('home-section', require('./components/Home.vue').default);
Vue.component('about-section', require('./components/About.vue').default);
Vue.component('schedule-section', require('./components/Schedule.vue').default);
Vue.component('contacts-section', require('./components/Contacts.vue').default);
Vue.component('news-section', require('./components/News.vue').default);
Vue.component('questionnaire-section', require('./components/FeedForm.vue').default);
Vue.component('lectureschedule-section', require('./components/LectureSchedule.vue').default);

Vue.prototype.$appData = window.__APP_DATA__ || {}

const app = new Vue({
    el: '#app',
    router,
});