<template>
    <div>
        <modal
            :show="creationForm.show"
            title="Add schedule"
            @closed="closeModal"
        >
            <div>
                Date: <input v-model="creationForm.date">
            </div>
            <div>
                Hour: <input v-model="creationForm.hour">
            </div>
            <div>
                Hour to: <select v-model="creationForm.finishing_at" name="time" id="time" @click="generateTimesLeft()">
                <option v-for="time in times" :value="time" :key="time">
                    {{ time }}
                </option>
            </select>
            </div>
            <div>
                Employee: <select v-model="creationForm.user_id" name="user_id" id="user_id">
                <option v-for="employee in employees" :value="employee.id" :key="employee.name">
                    {{ employee.name }}
                </option>
            </select>
            </div>
            <!--Footer-->
            <div class="flex justify-end pt-2">
                <button @click="addSchedule()"
                        class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">
                    Action
                </button>
                <button @click="closeModal()"
                        class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close
                </button>
            </div>
        </modal>
    </div>
</template>
<script>
import axios from 'axios';
import { mapMutations, mapState } from 'vuex';

export default {
    data() {
        return {
            employees: [],
            times: []
        };
    },
    mounted() {
        this.getEmplyees();
    },
    methods: {
        ...mapMutations({
            closeCreationForm: 'schedules/closeCreationForm'
        }),
        closeModal() {
            this.closeCreationForm();
        },
        async addSchedule() {
            await axios.post('addSchedule', {
                'user_id': this.creationForm.user_id,
                'date': this.creationForm.date,
                'starting_at': this.creationForm.hour,
                'finishing_at': this.creationForm.finishing_at
            });
        },
        generateTimesLeft() {
            this.times = [];
            const regex = /\d+/;
            const numb = this.creationForm.hour;
            const count = numb.match(regex);
            for (let i = count; i <= 24; i++) {
                this.times.push(i + ':00');
            }
        },
        async getEmplyees() {
            const { data } = await axios.get('/api/employees');
            this.employees = data;
        }
    },
    watch: {
        async 'inputs.from'() {
            await axios.get('/api/week');
        }
    },
    computed: {
        ...mapState({
            creationForm: state => state.schedules.createForm
        })
    }
};
</script>
