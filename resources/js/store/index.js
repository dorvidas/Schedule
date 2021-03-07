import Vue from 'vue'
import Vuex from 'vuex'
import schedules from './modules/schedules'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        schedules
    },
    strict: debug
})
