/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

import './styles/app.css';

import './bootstrap';
import Vue from 'vue';
import Base from './Base';
import App from './components/App';


import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


import VueConfirmDialog from 'vue-confirm-dialog'
Vue.use(VueConfirmDialog)
Vue.component('vue-confirm-dialog', VueConfirmDialog.default)
const moment = require('moment')
Vue.use(require('vue-moment'), {
  moment
})
import VueRouter from 'vue-router'
Vue.use(VueRouter)
var router = {
  components: {Base},
  routes: [
      {
              name: "app",
              path: '/app',
              component:  App,
              props: true,
              children:[
              ]
      }
  ]
};
router = new VueRouter(router);
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
import device from "vue-device-detector"
Vue.use(device)
var config = JSON.parse(document.getElementById('_symfonyData').innerHTML);
console.log(config);
new Vue({
    data: function() {
        return {
            config:config,
        }
    },
    el: '#app',
    render: h => h(Base),  router: router,
});