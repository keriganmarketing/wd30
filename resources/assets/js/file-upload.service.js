function upload(formData) {
    const url = `/avatar`;
    return axios.post(url, formData)
        .then(response => {
            console.log(response);
        });
        // // get data
        // .then(x => x.data)
        // // add url field
        // .then(x => x.map(img => Object.assign({},
        //     img, { url: `}/images/${img.id}` })));
}

export { upload }