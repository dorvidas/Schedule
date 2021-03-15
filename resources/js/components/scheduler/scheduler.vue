<template>
    <div class="flex justify-center h-3/4">
        <div class="flex w-3/4 overflow-y-auto">
            <day-schedules
                v-for="date in days"
                :key="date"
                :date="date"
            ></day-schedules>
        </div>
    </div>
</template>
<script>
import { mapMutations, mapActions } from 'vuex'
import DaySchedules from "./day-schedules";
export default {
    components: { DaySchedules },
    data: function() {
        return {
            days: []
        }
    },
    mounted(){
        this.loadDays();
    },
    methods: {
        loadDays: function(){
            axios.get('/api/week').
            then((response)=>{
                this.days=response.data;
            }).
            catch(function(error){
                console.log(error);
            });
        },
        ...mapMutations({
            addItem: 'schedules/addItem'
        }),
        ...mapActions({
            getSchedules: 'schedules/getSchedules'
        })
    },
    computed: {},
    created(){
        this.getSchedules();
    }
};
</script>
