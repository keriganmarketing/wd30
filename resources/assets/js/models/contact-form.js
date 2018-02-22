export default class ContactForm {
    constructor (data) {
        for (let field in data) {
            this[field] = data[field];
        }
    }

    submit () {
        let vm = this;
        window.axios.post('/leads', {
            name: this.name,
            phone: this.phone,
            email: this.email,
            message: this.message
        })
            .then(response => {
                let r = response.data;
                this.name = r.name;
                this.phone = r.phone;
                this.email = r.email;
                this.message = r.message;
                this.reset();
                this.success = true;
            })
            .catch(err => {
                this.success = false;
                vm.errors = err.response.data.errors;
            });
    }

    reset () {
        this.name = '';
        this.email = '';
        this.phone = '';
        this.message = '';
        this.errors = {};
    }
}