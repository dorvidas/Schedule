<template>
    <div>
        <div v-if="getAssigneesForDateAndHour(date, hour).length > 0" class="flex">
            <div v-for="employee in getAssigneesForDateAndHour(date, hour)">
                {{employee.name}}
            </div>
        </div>
        <div v-else>
            <a href="javascript:" @click="openModal">+</a>
        </div>
    </div>
</template>
<script>
import {mapGetters, mapMutations} from 'vuex'
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
    methods:{
        ...mapMutations({
            openCreationForm: 'schedules/openCreationForm'
        }),
        openModal(){
            this.openCreationForm({date: this.date, hour: this.hour});
        }
    },
    data() {
        return {}
    }
};
</script>

