<template>
    <div class="flex">
        <day-schedules
            v-for="date in 7"
            :key="date"
            :date="date"
        ></day-schedules>
    </div>
</template>
<script>
import { mapMutations, mapActions } from 'vuex'
import DaySchedules from "./day-schedules";
export default {
    components: { DaySchedules },
    methods: {
        ...mapMutations({
            addItem: 'schedules/addItem'
        }),
        ...mapActions({
            getSchedules: 'schedules/getSchedules'
        })
    },
    created(){
        this.getSchedules();
    },
    data() {
        return {}
    }
};
</script>
