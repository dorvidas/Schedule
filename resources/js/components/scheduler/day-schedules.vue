<template>
    <div class="flex-grow">
        <div class="text-center bg-purple-300">{{ date }}</div>
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
