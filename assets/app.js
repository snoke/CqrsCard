/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

import './styles/app.css';

import './bootstrap';
import Vue from 'vue';
import Base from './Base';
import App from './components/App';

import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { faCogs } from '@fortawesome/free-solid-svg-icons'
import { faCog } from '@fortawesome/free-solid-svg-icons'
import { faUserPlus } from '@fortawesome/free-solid-svg-icons'
import { faEdit } from '@fortawesome/free-solid-svg-icons'
import { faFile } from '@fortawesome/free-solid-svg-icons'
import { faImage } from '@fortawesome/free-solid-svg-icons'
import { faCamera } from '@fortawesome/free-solid-svg-icons'
import { faPaperPlane} from '@fortawesome/free-solid-svg-icons'
import { faComments} from '@fortawesome/free-solid-svg-icons'
import { faSave} from '@fortawesome/free-solid-svg-icons'
import { faSignInAlt} from '@fortawesome/free-solid-svg-icons'
import { faSignOutAlt} from '@fortawesome/free-solid-svg-icons'
import { faAddressBook} from '@fortawesome/free-solid-svg-icons'
import { faQuestion} from '@fortawesome/free-solid-svg-icons'
import { faBan} from '@fortawesome/free-solid-svg-icons'
import { faEraser} from '@fortawesome/free-solid-svg-icons'
import { faCheck} from '@fortawesome/free-solid-svg-icons'
import { faLock} from '@fortawesome/free-solid-svg-icons'
import { faUnlock} from '@fortawesome/free-solid-svg-icons'
import { faKeyboard} from '@fortawesome/free-solid-svg-icons'
import { faSpinner} from '@fortawesome/free-solid-svg-icons'
import { faArrowUp} from '@fortawesome/free-solid-svg-icons'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faUserSecret)
library.add(faCogs)
library.add(faCog)
library.add(faUserPlus)
library.add(faEdit)
library.add(faFile)
library.add(faImage)
library.add(faCamera)
library.add(faPaperPlane)
library.add(faComments)
library.add(faSave)
library.add(faSignInAlt)
library.add(faSignOutAlt)
library.add(faAddressBook)
library.add(faQuestion)
library.add(faBan)
library.add(faEraser)
library.add(faCheck)
library.add(faLock)
library.add(faUnlock)
library.add(faKeyboard)
library.add(faSpinner)
library.add(faArrowUp)

Vue.component('font-awesome-icon', FontAwesomeIcon)
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
import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios)
import device from "vue-device-detector"
Vue.use(device)

new Vue({
    data: function() {
        return {
            products: [],
            config:[],
        }
    },
    methods: {
        productAddToCart: function(product) {
            console.log("this.$root.$emit('cartAddProduct'");
            this.$root.$emit('cartAddProduct', product);
        },
        appGetProducts: function() {
            let parent = this;
            axios.get('/appGetProducts')
                .then(function (response) {
                    parent.products = Object.assign({}, response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
    el: '#app',
    render: h => h(Base),  router: router,
});