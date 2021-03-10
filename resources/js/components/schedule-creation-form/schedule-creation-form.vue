<template>
    <div>
        <modal
            :show="creationForm.show"
            title="Add schedule"
            @closed="closeModal"
        >
            Date: <input v-model="creationForm.date">
            Hour: <input v-model="creationForm.hour">

            <!--Footer-->

            <div class="flex justify-end pt-2">
                <button
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
        }
    },
    computed: {
        ...mapState({
            creationForm: state => state.schedules.createForm
        })
    }
};
</script>
