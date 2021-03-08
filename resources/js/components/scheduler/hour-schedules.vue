<template>
    <div>
        <div v-if="getAssigneesForDateAndHour(date, hour).length > 0" class="flex">
            <div v-for="employee in getAssigneesForDateAndHour(date, hour)">
                {{employee.name}}
            </div>
        </div>
        <div v-else>No</div>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
    props: {
        hour: {
            type: Number,
            required: true
        },
        date: {
            type: Number,
            required: true
        }
    },
    computed: {
        ...mapGetters({
            getAssigneesForDateAndHour: 'schedules/getAssigneesForDateAndHour'
        })
    },
    data() {
        return {}
    }
};
</script>
