require("./bootstrap");

window.Vue = require("vue");
import Vue from "vue";
import VueRouter from "vue-router";
import Vuetify from "vuetify";
import cs from "vuetify/lib/locale/cs";
import { store } from "./store/store";
import axios from "axios";
import VueApexCharts from "vue-apexcharts";

Vue.use(VueRouter);
Vue.use(Vuetify);
Vue.use(require("vue-shortkey"));
Vue.use(VueApexCharts);
Vue.component("apexchart", VueApexCharts);

Vue.config.silent = true;

let Layout = () => import("./components/Layout/Layout.vue");
let ServerModuleLayout = () => import("./components/Modules/Server/ServerModuleLayout.vue")

let Login = () => import("./components/Auth/Login.vue");
let PageNotFound = () => import("./components/Auth/404.vue");
let NotAuthorized = () => import("./components/Auth/403.vue");

let routes = [
    {
        path: "/",
        component: Layout,
        children: [{
            path: "server/:serverId/:component",
            component: ServerModuleLayout
        }],
    },
    {
        path: "/login",
        component: Login,
    },
    {
        path: "/403",
        component: NotAuthorized,
    },
    {
        path: "*",
        component: PageNotFound,
    },
];

const router = new VueRouter({
    routes,
});

const opts = {};

const app = new Vue({
    el: "#app",
    store,
    router,
    vuetify: new Vuetify({
        opts,
        lang: {
            locales: { cs },
            current: "cs",
        },
    }),
});
