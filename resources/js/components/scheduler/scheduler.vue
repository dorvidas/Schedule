<template>
    <div class="flex justify-center h-3/4">
        <div class="flex w-3/4 overflow-y-auto">
            <day-schedules
                v-for="date in days"
                :key="date"
                :date="date"
            ></day-schedules>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import { mapActions } from 'vuex';
import DaySchedules from './day-schedules';
export default {
    components: { DaySchedules },
    data() {
        return {
            days: []
        };
    },
    mounted() {
        this.loadDays();
    },
    methods: {
        async loadDays() {
            const { data } = await axios.get('/api/week');
            this.days = data;
        },
        ...mapActions({
            getSchedules: 'schedules/getSchedules'
        })
    },
    created() {
        this.getSchedules();
    }
};
</script>
