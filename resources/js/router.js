import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/Home.vue';
import About from './components/About.vue';
import Schedule from './components/Schedule.vue';
import News from './components/News.vue';
import Contacts from './components/Contacts.vue'
import FeedForm from './components/FeedForm.vue'
import LectureSchedule from './components/LectureSchedule.vue'

Vue.use(VueRouter);

const routes = [
  { path: '/', component: Home },
  { path: '/about', component: About },
  { path: '/schedule', component: Schedule },
  { path: '/news', component: News },
  { path: '/contacts', component: Contacts },
  { path: '/questionnaire', component: FeedForm },
  { path: '/lecture-schedule', component: LectureSchedule },
];

const router = new VueRouter({
  mode: 'history',
  routes,
});

export default router;
