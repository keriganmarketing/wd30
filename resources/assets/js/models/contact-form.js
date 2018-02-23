export default class ContactForm {
    constructor (data) {
        for (let field in data) {
            this[field] = data[field];
        }
    }

    submit () {
        let vm = this;
        window.axios.post('/leads', {
            _token: this._token,
            name: this.name,
            phone: this.phone,
            email: this.email,
            message: this.message,
            agent: this.agent,
            agent_email: this.agent_email,
            agent_phone: this.agent_phone,
            listing: this.listing,
            listing_address: this.listing_address,
            listing_latitude: this.listing_latitude,
            listing_longitude: this.listing_longitude,
        })
            .then(response => {
                let r = response.data;
                this.name = r.name;
                this.phone = r.phone;
                this.email = r.email;
                this.message = r.message;
                this.listing = r.listing;
                this.listing_address = r. listing_address;
                this.listing_latitude = r. listing_latitude;
                this.listing_longitude = r. listing_longitude;

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