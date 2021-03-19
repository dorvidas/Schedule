<template>
    <div>
        <modal
            :show="creationForm.show"
            title="Add schedule"
            @closed="closeModal"
        >
            <div>
                Date: <input v-model="date">
            </div>
            <div>
                Hour: <input v-model="hour">
            </div>
            <div>
                Hour to: <select v-model="finishingAt" name="time" id="time">
                <option v-for="time in times" :value="time" :key="time">
                    {{ time }}
                </option>
            </select>
            </div>
            <div>
                Employee: <select v-model="selectedUserId" name="user_id" id="user_id">
                <option v-for="employee in employees" :value="employee.id" :key="employee.name">
                    {{ employee.name }}
                </option>
            </select>
            </div>
            <!--Footer-->
            <div class="flex justify-end pt-2">
                <button @click="addSchedule()"
                        class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">
                    Create
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
import {mapActions, mapMutations, mapState} from 'vuex';

export default {
    data() {
        return {
            employees: [],
            finishingAt: null,
            selectedUserId: null
        };
    },
    mounted() {
        this.getEmployees();
    },
    methods: {
        ...mapMutations({
            closeCreationForm: 'schedules/closeCreationForm',
            setFormDate: 'schedules/setFormDate',
            setFormTimeFrom: 'schedules/setFormTimeFrom'
        }),
        ...mapActions({
            getSchedules: 'schedules/getSchedules'
        }),
        closeModal() {
            this.closeCreationForm();
        },
        async addSchedule() {
            await axios.post('addSchedule', {
                'user_id': this.selectedUserId,
                'date': this.date,
                'starting_at': this.hour,
                'finishing_at': this.finishingAt
            });

            await this.getSchedules();

            this.closeModal();
        },
        async getEmployees() {
            const { data } = await axios.get('/api/employees');
            this.employees = data;
        }
    },
    computed: {
        ...mapState({
            creationForm: state => state.schedules.createForm
        }),
        date: {
            get() {
                return this.creationForm.date;
            },
            set(value) {
                this.setFormDate(value);
            }
        },
        hour: {
            get() {
                return this.creationForm.hour;
            },
            set(value) {
                this.setFormTimeFrom(value);
            }
        },
        times() {
            let times = [];

            if (!this.hour) {
                return times;
            }

            const regex = /\d+/;
            const numb = this.hour;
            const count = numb.match(regex);
            for (let i = count; i <= 24; i++) {
                times.push(i + ':00');
            }
            return times;
        }
    }
};
</script>
