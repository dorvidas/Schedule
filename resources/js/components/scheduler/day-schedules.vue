<template>
    <div class="flex-grow">
        <div class="text-center p-4 bg-indigo-900 text-white">{{ date }}</div>
        <hour-schedules
            v-for="hour in 24"
            :key="hour"
            :hour="hour"
            :date="date"
        ></hour-schedules>
    </div>
</template>
<script>
import HourSchedules from './hour-schedules';
export default {
    props: {
        date: {
            type: String,
            required: true
        }
    },
    data() {
        return {}
    },
    components: {
        HourSchedules
    }
};
</script>
