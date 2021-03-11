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
            Hour to: <input v-model="creationForm.finishing_at">
            </div>
            <div>
            Employee: <input v-model="creationForm.user_id">
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
        }
    },
    computed: {
        ...mapState({
            creationForm: state => state.schedules.createForm
        })
    }
};
</script>
