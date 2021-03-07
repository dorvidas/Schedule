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
import { mapMutations } from 'vuex'
import DaySchedules from "./day-schedules";
export default {
    components: { DaySchedules },
    methods: {
        ...mapMutations({
            addItem: 'schedules/addItem'
        })
    },
    created(){
        this.addItem({
            date: 1,
            timeFrom: 1,
            timeTo: 3,
            name: 'Darius',
        });
        this.addItem({
            date: 1,
            timeFrom: 2,
            timeTo: 4,
            name: 'Virgis',
        });
        this.addItem({
            date: 3,
            timeFrom: 5,
            timeTo: 6,
            name: 'Petras',
        });
    },
    data() {
        return {}
    }
};
</script>
