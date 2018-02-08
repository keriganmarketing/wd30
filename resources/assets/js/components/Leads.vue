<template>
    <div class="container mx-auto">
        <lead-pagination
            @fetchleads="fetchLeads"
            :pagination="pagination"
        />
        <lead-tabs @fetchleads="fetchLeads" :viewing-active-leads="viewingActiveLeads"/>
        <lead
            v-for="lead in leads"
            :key="lead.id"
            :lead="lead"
            :active-leads="viewingActiveLeads"
            :current-page="pagination.current_page"
            @archived="fetchLeads('active', pagination.current_page)"
            @unarchived="fetchLeads('archived', pagination.current_page)"
            @important="fetchLeads"
        />
        <lead-pagination @fetchleads="fetchLeads" :pagination="pagination"/>
    </div>

</template>

<script>
class Pagination {
    constructor(data) {
        for (let field in data) {
            this[field] = data[field];
        }
    }
}
export default {
    data() {
        return {
            leads:  [],
            viewingActiveLeads: true,
            pagination: new Pagination({
                next_page_url: '',
                prev_page_url: '',
                from: '',
                to: '',
                last_page: '',
                current_page: '',
                total: ''
            })
        }
    },
    mounted () {
        this.fetchLeads('active');
    },
    methods: {
        fetchLeads(type, page = 1) {
            let url = '';
            switch (type) {
            case 'active':
                this.viewingActiveLeads = true;
                url = '/leads?page=' + page;
                break;
            case 'archived':
                this.viewingActiveLeads = false;
                url = '/archivedleads?page=' + page;
                break;
            default:
                url = type;
                break;
            }
            axios.get(url)
                .then(response => {
                    this.pagination = response.data;
                    this.leads = response.data.data;
                })
        }
    }
}
</script>
