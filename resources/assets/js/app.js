require('./bootstrap');

window.Vue = require('vue');

require('./load-components');
import User from './models/user';

const app = new Vue({
    el: '#app',
    data: {
        user: new User({
            id: null,
            name: null,
            email: null,
            phone_number: null,
            address: null,
            mls_id: null,
        }),
        leads: true,
        properties: false,
        settings: false
    },
    mounted () {
        this.user.authenticate();
    },
    methods: {
        sbc (data) {
            this.user.update(data);
        },
        showLeads() {
            this.properties = false;
            this.settings   = false;

            this.leads      = true;
        },
        showProperties() {
            this.settings   = false;
            this.leads      = false;

            this.properties = true;
        },
        showSettings() {
            this.leads      = false;
            this.properties = false;

            this.settings   = true;
        }
    }
});
