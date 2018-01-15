<template>
<div class="container mx-auto">
    <ul class="list-reset flex justify-end">
        <li class="-mb-px mr-1">
            <a class="bg-white inline-block py-2 px-4 font-semibold hover:text-blue cursor-pointer"
               @click="getLeads"
               :class="{'active-tab': viewingActiveLeads, 'border-b': !viewingActiveLeads}"
            >
            Active
            </a>
        </li>
        <li class="mr-1">
            <a class="bg-white inline-block py-2 px-4 font-semibold hover:text-blue cursor-pointer"
               @click="getInactiveLeads"
               :class="{'active-tab': !viewingActiveLeads, 'border-b': viewingActiveLeads}"
            >
            Archived
            </a>
        </li>
    </ul>
    <lead
        v-for="lead in leads"
        :key="lead.id"
        :lead="lead"
        :active-leads="viewingActiveLeads"
        @archived="getLeads"
        @unarchived="getInactiveLeads"
    >
    </lead>
</div>

</template>

<script>
    export default {
        data() {
            return {
                leads:  [],
                viewingActiveLeads: true,
                nextPageUrl: '',
                prevPageUrl: ''
            }
        },
        methods: {
            getLeads() {
                this.viewingActiveLeads = true;
                axios.get('/leads')
                    .then(response => {
                        this.leads = response.data.data;
                        this.prevPageUrl = response.data.prev_page_url;
                        this.nextPageUrl = response.data.next_page_url
                });
            },
            getInactiveLeads() {
                this.viewingActiveLeads = false;
                axios.get('/archivedleads')
                    .then(response => {
                        this.leads = response.data.data;
                        this.prevPageUrl = response.data.prev_page_url;
                        this.nextPageUrl = response.data.next_page_url
                });
            }
        },
        mounted () {
            this.getLeads();
        }
    }
</script>
