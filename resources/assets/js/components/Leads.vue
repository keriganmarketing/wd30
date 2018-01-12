<template>
<div class="container mx-auto">
    <ul class="list-reset flex justify-end">
        <li class="-mb-px mr-1">
            <a class="bg-white inline-block py-2 px-4 font-semibold hover:text-blue"
               @click="getLeads"
               :class="{'active-tab': viewingActiveLeads, 'border-b': !viewingActiveLeads}"
            >
            Active
            </a>
        </li>
        <li class="mr-1">
            <a class="bg-white inline-block py-2 px-4 font-semibold hover:text-blue"
               @click="getInactiveLeads"
               :class="{'active-tab': !viewingActiveLeads, 'border-b': viewingActiveLeads}"
            >
            Inactive
            </a>
        </li>
    </ul>
    <lead v-for="lead in leads" :key="lead.id" :data-lead="lead" :active-leads="viewingActiveLeads" @archived="getLeads" @unarchived="getInactiveLeads"></lead>
</div>

</template>

<script>
    export default {
        data() {
            return {
                leads:  [],
                viewingActiveLeads: true
            }
        },
        methods: {
            getLeads() {
                this.viewingActiveLeads = true;
                axios.get('/leads')
                    .then(response => {
                        this.leads = response.data.data;
                });
            },
            getInactiveLeads() {
                this.viewingActiveLeads = false;
                axios.get('/archivedleads')
                    .then(response => {
                        this.leads = response.data.data;
                });
            }
        },
        mounted () {
            this.getLeads();
        }
    }
</script>
