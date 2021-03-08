import Schedule from "../../types/Schedule";

const state = () => ({
    items: [],
})

// getters
const getters = {
    getAssigneesForDateAndHour: (state) => (date, hour) => {
        return state.items.filter(schedule => {
            return schedule.date === date
                && hour >= schedule.timeFrom
                && hour < schedule.timeTo
            }
        )
    }
}

// actions
const actions = {
    async getSchedules ({ commit }) {
        try {
            const { data } = await axios.get('/api/schedules');
            commit('setItems', data.map(item => new Schedule(item.date, item.timeFrom, item.timeTo, item.name)));
            }
        catch(error){
            console.log(error);
        }
    }
}

// mutations
const mutations = {
    /**
     * @param {Schedule} item Schedule.
     */
    addItem (state, item) {
        state.items.push(item);
    },
    /**
     * @param {Array.<Schedule>} items List of schedules.
     */
    setItems (state, items) {
        state.items = items;
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
