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
            commit('setItems', data);
            }
        catch(error){
            console.log(error);
        }
    }
}

// mutations
const mutations = {
    addItem (state, item) {
        state.items.push(item);
    },
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
