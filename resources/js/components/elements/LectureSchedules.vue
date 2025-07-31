<template>
    <section class="Schedules pf cyber-razor-top bg-dark fg-white p-3">
        <div class="container">
            <div class="content" v-if="LectureSchedule.length === 0">
                <div class="text empty-page" style="text-align: left; padding: 25px 0">
                    <h1 class="t-t-h">
                        НАЖАЛЬ ІНФОРМАЦІЯ ПОКИ ВІДСУТНЯ
                    </h1>
                    <p>
                        *Стежте за новинами у нашому <a
                            href="https://www.instagram.com/nice_guys_party_kyiv?igsh=OXd4N2l1aTBsNWRt"
                            target="_blank">інстаграмі</a> чи на <a href="news">сайті</a>
                    </p>
                </div>
            </div>
            <div class="content" v-else>
                <div class="text">
                    <h1 class="t-t-h">
                        РОЗКЛАД
                    </h1>
                    <p>
                        *Дані розкладу можуть змінитися до дати фестивалю.
                    </p>
                </div>
                <div class="schedule-group">
                    <div class="group" v-for="(items, day) in groupedByDay" :key="day">
                        <h1>День {{ day }}</h1>
                        <ul>
                            <li v-for="(item, index) in items" :key="item.id">
                                <b>{{ item.time }}</b> - {{ item.value }}
                            </li>
                        </ul>
                    </div>

                    <a href="https://ottry.com/events/asian-wave-2025" target="_blank">
                        <button class="cyber-button-small bg-blue fg-white" type="button">
                            КУПИТИ БІЛЕТ
                            <span class="glitchtext">Вперед</span>
                            <span class="tag fg-white">AW</span>
                        </button>
                    </a>
                </div>
            </div>
            <img class="back_img" src="/storage/source/persone/nabi1.png" alt="">
        </div>
    </section>
</template>

<script>
import { computed } from 'vue'

export default {
    name: 'LectureSchedules',
    setup() {
        const LectureSchedule = computed(() => window.__APP_DATA__?.LectureSchedule || []);

        const groupedByDay = computed(() => {
            const map = {};
            for (const item of LectureSchedule.value) {
                if (!map[item.day]) {
                    map[item.day] = [];
                }
                map[item.day].push(item);
            }
            return map;
        });

        return {
            groupedByDay,
            LectureSchedule
        }
    }
}
</script>