//require('./bootstrap');
// Vue & Vue-Router
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// Bootstrap
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

// My Vue Files
import App from './views/App.vue'
import Cond from './views/Cond.vue'
import Fromaxios from './views/Fromaxios.vue'
import NewVehicle from './views/NewVehicle.vue'
import DropSelect from './views/DropSelect.vue'

import axios from 'axios'
axios.defaults.headers.common['Accept'] = 'application/json'

Vue.prototype.$http = axios

let router = new VueRouter({
    mode: 'history',
    base:'/app',
    routes: [
        {
            path: '/',
            component: App,
        },
        {
            path: '/cond',
            component: Cond,
        },
        {
            path: '/fromaxios',
            component: Fromaxios,
        },
        {
            path: '/newvehicle',
            component: NewVehicle,
        },
        {
            path: '/drop',
            component: DropSelect,
        },
    ]
});

export default router

const app = new Vue({
    router
}).$mount('#app');
