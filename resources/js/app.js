require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
import App from './vue/app';


import { library }               from '@fortawesome/fontawesome-svg-core';
import { faPlusSquare, faTrash } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon }       from '@fortawesome/vue-fontawesome';
import FlashMessage              from '@smartweb/vue-flash-message';

library.add(faPlusSquare, faTrash);

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.use(FlashMessage, { time: 4000});

const app = new Vue({
    el: '#app',
    components: { App }
});