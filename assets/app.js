/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

import './styles/app.css';

import './bootstrap';
import Vue from 'vue';
import Base from './Base';
import App from './components/App';


import {BootstrapVue, IconsPlugin} from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import VueRouter from 'vue-router'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

var config = JSON.parse(document.getElementById('_symfonyData').innerHTML);
console.log(config);
new Vue({
    data: function () {
        return {
            config: config,
        }
    },
    el: '#app',
    render: h => h(Base),
    router: new VueRouter({
        components: {Base},
        routes: [
            {
                name: "app",
                path: '/app',
                component: App,
                props: true,
                children: []
            }
        ]
    }),
});