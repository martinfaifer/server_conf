import Vue from "vue";

import Vuex from "vuex";

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        alerts: [],
        user: []
    },
    actions: {},
    mutations: {
        update(state, alert) {
            state.alerts.push(alert);
        },
    },
    getters: {},
});
