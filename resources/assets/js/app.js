require('./bootstrap');

window.Vue = require('vue');

import * as axios from 'axios';

Vue.component('bio-card', require('./components/BioCard.vue'));
Vue.component('welcome-card', require('./components/WelcomeCard.vue'));
Vue.component('leads', require('./components/Leads.vue'));
Vue.component('lead', require('./components/Lead.vue'));
Vue.component('lead-pagination', require('./components/LeadPagination.vue'));
Vue.component('lead-tabs', require('./components/LeadTabs.vue'));

const app = new Vue({
    el: '#app',
    data: {
        user: {
            id: '',
            name: '',
            email: '',
            phone_number: '',
            address: '',
            mls_id: '',
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
                    phone_number: this.user.phone_number,
                    mls_id: this.user.mls_id,
                    address: this.user.address
                }
            })
            .then(response => {
                this.user = response.data;
            });
        },
        authenticate () {
            axios.get('/authenticate').then(response => {
                this.user.id           = response.data.id;
                this.user.name         = response.data.name;
                this.user.email        = response.data.email;
                this.user.mls_id       = response.data.mls_id;
                this.user.address      = response.data.address;
                this.user.phone_number = response.data.phone_number;
            });
        }
    },
    mounted() {
        this.authenticate();
    }
});
