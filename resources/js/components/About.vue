<template>
    <div>
        <nav class="line-accent page-tab-menu">
            <ul>
                <li :class="{ active: activeTab === 'about' }" @click="activeTab = 'about'">
                    ПРО НАС
                </li>
                <li :class="{ active: activeTab === 'organizers' }" @click="activeTab = 'organizers'">
                    ОРГАНІЗАТОРИ
                </li>
                <li :class="{ active: activeTab === 'jury' }" @click="activeTab = 'jury'">
                    ЖУРІ
                </li>
                <li :class="{ active: activeTab === 'partners' }" @click="activeTab = 'partners'">
                    ПАРТНЕРИ
                </li>
                <li :class="{ active: activeTab === 'shops' }" @click="activeTab = 'shops'">
                    МАГАЗИНИ
                </li>
                <li :class="{ active: activeTab === 'schedules' }" @click="activeTab = 'schedules'">
                    МАЙСТЕР КЛАСИ
                </li>
                <!-- <li :class="{ active: activeTab === 'schedules' }" @click="activeTab = 'schedules'">
                    ГРАФІК
                </li>
                <li :class="{ active: activeTab === 'lectureschedule' }" @click="activeTab = 'lectureschedule'">
                    ГРАФІК ЛЕКЦІЙ
                </li> -->
                <li :class="{ active: activeTab === 'prices' }" @click="activeTab = 'prices'">
                    ЦІНИ
                </li>
            </ul>
        </nav>
        <component :is="currentComponent" />
    </div>
</template>

<script>
import Organizers from './elements/Organizers.vue';
import About from './elements/About.vue';
import Jury from './elements/Jury.vue';
import Partners from './elements/Partners.vue';
import Shops from './elements/Shops.vue';
import Schedules from './elements/Schedules.vue';
import Prices from './elements/Prices.vue';
import LectureSchedules from './elements/LectureSchedules.vue';

export default {
    name: 'AboutPage',
    components: {
        Organizers,
        About,
        Jury,
        Partners,
        Shops,
        Schedules,
        Prices,
        LectureSchedules
    },
    data() {
        return {
            activeTab: localStorage.getItem('activeTab') || 'about'
        };
    },
    watch: {
        activeTab(newVal) {
            localStorage.setItem('activeTab', newVal);
        }
    },
    computed: {
        currentComponent() {
            switch (this.activeTab) {
                case 'about': return 'About'
                case 'organizers': return 'Organizers'
                case 'jury': return 'Jury'
                case 'partners': return 'Partners'
                case 'shops': return 'Shops'
                case 'schedules': return 'Schedules'
                case 'prices': return 'Prices'
                case 'lectureschedule': return 'LectureSchedules'
                default: return 'About';
            }
        }
    }
};
</script>