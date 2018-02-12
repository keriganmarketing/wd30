require('./bootstrap');

window.Vue = require('vue');

require('./load-components');
import User from './models/user';
import Content from './models/content';

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
        content: new Content({
            id: '',
            title: null,
            body: null
        }),
        selected: 'leads'
    },
    computed: {
        boilerplate: function () {
            return this.user.name === '';
        }
    },
    mounted () {
        this.user.authenticate();
        this.content.fetch();
    },
    methods: {
        sbc (data) {
            this.user.update(data);
        },
        updateContent(data) {
            this.content.update(data);
        }
    }
});
