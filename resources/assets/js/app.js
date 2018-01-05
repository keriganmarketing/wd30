require('./bootstrap');

window.Vue = require('vue');

import * as axios from 'axios';

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('bio-card', require('./components/BioCard.vue'));

class User {
}

const app = new Vue({
    el: '#app'
});
