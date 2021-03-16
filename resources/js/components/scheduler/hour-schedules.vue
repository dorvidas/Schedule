<template>
    <div class="text-center bg-indigo-50 hover:bg-indigo-200 overflow-y-auto h-12">
        <div v-if="getAssigneesForDateAndHour(date, hour).length > 0">
            <div v-for="employee in getAssigneesForDateAndHour(date, hour)" :key="employee.name">
                {{ employee.name }}
            </div>
        </div>
        <div v-else>
            <div v-if="this.hour < 10">
                <a href="javascript:" @click="openModal">{{"0" + this.hour + ":00"}}</a>
            </div>
            <div v-else>
                <a href="javascript:" @click="openModal">{{this.hour + ":00"}}</a>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters, mapMutations} from 'vuex';
export default {
    props: {
        hour: {
            type: Number,
            required: true
        },
        date: {
            type: String,
            required: true
        }
    },
    computed: {
        ...mapGetters({
            getAssigneesForDateAndHour: 'schedules/getAssigneesForDateAndHour'
        })
    },
    methods: {
        ...mapMutations({
            openCreationForm: 'schedules/openCreationForm'
        }),
        openModal() {
            this.openCreationForm({date: this.date, hour: this.hour + ':00'});
        }
    },
    data() {
        return {};
    }
};
</script>

