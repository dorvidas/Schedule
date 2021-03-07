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
const actions = {}

// mutations
const mutations = {
    addItem (state, item) {
        state.items.push(item);
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
