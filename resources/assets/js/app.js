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
        })
    },
    mounted () {
        this.user.authenticate();
    },
    methods: {
        sbc (data) {
            this.user.update(data);
        },
    }
});
