<template>
<div class="container mx-auto">
    <lead-pagination @fetchleads="fetchLeads" :pagination="pagination"></lead-pagination>
    <lead-tabs @fetchleads="fetchLeads" :viewing-active-leads="viewingActiveLeads"></lead-tabs>
    <lead
        v-for="lead in leads"
        :key="lead.id"
        :lead="lead"
        :active-leads="viewingActiveLeads"
        @archived="fetchLeads('active')"
        @unarchived="fetchLeads('archived')"
    >
    </lead>
    <lead-pagination @fetchleads="fetchLeads" :pagination="pagination"></lead-pagination>
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
        methods: {
            fetchLeads(type) {
                let url = '';
                switch (type) {
                    case 'active':
                        this.viewingActiveLeads = true;
                        url = '/leads';
                        break;
                    case 'archived':
                        this.viewingActiveLeads = false;
                        url = '/archivedleads';
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
        },
        mounted () {
            this.fetchLeads('active');
        }
    }
</script>
