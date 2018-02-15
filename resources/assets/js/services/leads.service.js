export default class LeadService {
    constructor () {
        this.active = 'leads?important=';
        this.archived = 'archivedleads?important=';
    }
    getPage (url) {
        return window.axios.get(url).then(response => response);
    }

    activeLeads(important, page = 1) {
        return window.axios.get(this.active + important + '&page=' + page).then(response => response);
    }

    archivedLeads(important, page = 1) {
        return window.axios.get(this.archived + important + '&page=' + page).then(response => response);
    }

}