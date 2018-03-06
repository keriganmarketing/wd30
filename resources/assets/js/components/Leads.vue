<template>
    <div class="container mx-auto">
        <div class="lead-controls flex md:flex-row-reverse items-end justify-center md:justify-end py-2 flex-wrap h-44 md:h-32">
            <lead-filters
                @toggle="filter"
                :active-filter="activeFilter"
                :important-filter="importantFilter"
                class="md:flex-1 w-2/3 items-end mb-1 md:ml-8 text-base"
            />
            <lead-pagination
                @page="page"
                :pagination="pagination"
                class="md:flex-1 w-full justify-start mx-auto md:w-1/3 md:mr-8 items-end h-16 text-base"
            />
        </div>
        <lead
            v-for="lead in leads"
            :key="lead.id"
            :lead="lead"
            :active-leads="activeFilter"
            :current-page="pagination.current_page"
            @archived="onArchived"
            @unarchived="onUnarchived"
            @important="refresh"
        />
        <lead-pagination
            v-if="pagination.total != 0"
            @page="page"
            :pagination="pagination"
        />
    </div>

</template>

<script>
import Pagination from '../models/pagination';
import LeadService from '../services/leads.service';
export default {
    data() {
        return {
            pagination: new Pagination({
                next_page_url: '',
                prev_page_url: '',
                from: '',
                to: '',
                last_page: '',
                current_page: '',
                total: ''
            }),
            leads:  [],
            leadService: new LeadService(),
            activeFilter: true,
            importantFilter: false,
        }
    },
    mounted () {
        this.getActive();
    },
    watch: {
        activeFilter: function (active) {
            if (active) {
                this.getActive(this.importantFilter);
            } else {
                this.getArchived(this.importantFilter);
            }
        },
        importantFilter: function (important) {
           if (this.activeFilter) {
               this.getActive(important);
            } else {
                this.getArchived(important);
            }
        }
    },
    methods: {
        page (url) {
            this.leadService.getPage(url)
                .then(response => {
                    this.leads = response.data.data;
                    this.pagination = new Pagination(response.data);
                })
        },
        filter (attribute) {
            this[attribute] = ! this[attribute];
        },
        onArchived () {
            this.getActive(this.importantFilter, this.pagination.current_page);
            this.$emit('update-leads-count');
        },
        onUnarchived () {
            this.getArchived(this.importantFilter, this.pagination.current_page);
            this.$emit('update-leads-count');
        },
        getActive (important = this.importantFilter, page = 1) {
            this.leadService.activeLeads(important, page)
                .then(response => {
                    this.leads = response.data.data;
                    this.pagination = response.data;
                });
        },
        getArchived (important = this.importantFilter, page = 1) {
            this.leadService.archivedLeads(important, page)
                .then(response => {
                    this.leads = response.data.data;
                    this.pagination = response.data;
                });
        },
        refresh (active, page) {
            if (active) {
                this.getActive(this.importantFilter, page);
            }else {
                this.getArchived(this.importantFilter, page);
            }
        }
    }
}
</script>

<style>
</style>

