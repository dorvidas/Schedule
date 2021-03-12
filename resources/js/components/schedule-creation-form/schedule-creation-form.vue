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
            Hour to:    <select v-model="creationForm.finishing_at" name="time" id="time" @click="generateTimesLeft()">
                            <option v-for="time in times" :value="time">
                                {{ time }}
                            </option>
                        </select>
            </div>
            <div>
            Employee:   <select v-model="creationForm.user_id" name="user_id" id="user_id">
                            <option v-for="employee in employees" :value="employee.id">
                                {{employee.name}}
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
import {mapMutations, mapState} from "vuex";

export default {
    data: function() {
        return {
            employees: [],
            times: []
        }},  
    mounted(){
        this.getEmplyees();
    },
    methods: {
        ...mapMutations({
            closeCreationForm: 'schedules/closeCreationForm'
        }),
        closeModal(){
            this.closeCreationForm();
        },
        addSchedule(){
            axios.post('addSchedule',{
                'user_id': this.creationForm.user_id,
                'date': this.creationForm.date,
                'starting_at': this.creationForm.hour,
                'finishing_at': this.creationForm.finishing_at,
            }).then((response)=>{
            console.log(response);
            }).catch(function(error){
                console.log(error);
            });
        },
        generateTimesLeft(){
            this.times = [];
            var regex = /\d+/;
            var numb = this.creationForm.hour;
            var count = numb.match(regex);
            for (var i = count; i <= 24; i++) {
                this.times.push(i+":00");
            }       
        },
        getEmplyees: function(){
            axios.get('/api/employees').
            then((response)=>{
                this.employees=response.data;
            }).
            catch(function(error){
                console.log(error);
            });
        }
    },
    computed: {
        ...mapState({
            creationForm: state => state.schedules.createForm
        })
    }
};
</script>
