export default class Content {
    constructor (data) {
        for (let field in data) {
            this[field] = data[field];
        }
    }

    fetch () {
        var self = this;
        window.axios.get('/content').then(response => {
            let data = response.data;
            for (let field in data) {
                self[field] = data[field];
            }
        });
    }
    update (updated) {
        window.axios({ method: 'patch', url: '/content/' + updated.id,
            data: {
                title: updated.title,
                body: updated.body,
            }
        })
            .then(response => {
                let data = response.data;
                for (let field in data) {
                    self[field] = data[field];
                }
            });

    }
}