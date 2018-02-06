function upload(formData) {
    const url = `/avatar`;
    return axios.post(url, formData)
        .then(response => response.data)
        .catch(err => err.data);
}

export { upload };