export default class User {
    constructor(data) {
        for (let field in data) {
            this[field] = data[field];
        }
    }
    authenticate () {
        var self = this;
        window.axios.get('/authenticate').then(response => {
            let data = response.data;
            for (let field in data) {
                self[field] = data[field];
            }
        });
    }
    update (updated) {
        window.axios({ method: 'patch', url: '/users/' + updated.id,
            data: {
                name: updated.name,
                email: updated.email,
                phone_number: updated.phone_number,
                mls_id: updated.mls_id,
                address: updated.address
            }
        })
            .then(response => {
                let data = response.data;
                for (let field in data) {
                    console.log(self);
                    self[field] = data[field];
                }
            });

    }
}