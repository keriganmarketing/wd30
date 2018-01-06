require('./bootstrap');

window.Vue = require('vue');

import * as axios from 'axios';

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('bio-card', require('./components/BioCard.vue'));

const app = new Vue({
    el: '#app',
    data: {
        user: {
            id: '',
            name: '',
            email: '',
            phone: '',
            address: '',
            mlsNumber: '',
        }
    },
    methods: {
        sbc (updated) {
            this.user = updated;
            axios({
                method: 'patch',
                url: '/users/' + this.user.id,
                data: {
                    name: this.user.name,
                    email: this.user.email,
                    phone_number: this.user.phone,
                    mls_id: this.user.mlsNumber,
                    address: this.user.address
                }
            })
            .then(response => {
                this.user = response.data;
            });
        }
    },
    mounted() {
        axios.get('/authenticate')
            .then(response => {
                this.user.id        = response.data.id;
                this.user.name      = response.data.name;
                this.user.email     = response.data.email;
                this.user.phone     = response.data.phone_number;
                this.user.address   = response.data.address;
                this.user.mlsNumber = response.data.mls_id;
            })
    }
});
