<template>
<div class="container mx-auto">
    <p class="mb-4 font-semibold text-grey-darker">Showing {{ pagination.from }} - {{ pagination.to }} out of {{ pagination.total }}</p>
    <ul class="list-reset flex justify start">
        <li class="mr-2">
            <button class="text-blue bg-white px-4 py-2 text-center cursor-pointer shadow"
               :disabled="pagination.prev_page_url == null"
               :class="{
                   'cursor-not-allowed': pagination.prev_page_url == null,
                   'opacity-50': pagination.prev_page_url == null
                   }"

               @click="fetchLeads(pagination.prev_page_url)"
            >
                   Prev
            </button>
        </li>
        <li class="mr-2">
            <a class="text-blue bg-white px-4 py-2 text-center flex shadow items-center"
            >
            {{ pagination.current_page }}
            </a>
        </li>
        <li class="mr-2">
            <button class="text-blue bg-white px-4 py-2 text-center cursor-pointer shadow"
               :disabled="pagination.next_page_url == null"
               :class="{
                   'cursor-not-allowed': pagination.next_page_url == null,
                   'opacity-50': pagination.next_page_url == null
                   }"

               @click="fetchLeads(pagination.next_page_url)"
            >
                   Next
            </button>
        </li>
    </ul>
    <ul class="list-reset flex justify-end">
        <li class="-mb-px mr-1">
            <a class="bg-white inline-block py-2 px-4 font-semibold hover:text-blue cursor-pointer"
               @click="fetchLeads('active')"
               :class="{'active-tab': viewingActiveLeads, 'border-b': !viewingActiveLeads}"
            >
            Active
            </a>
        </li>
        <li class="mr-1">
            <a class="bg-white inline-block py-2 px-4 font-semibold hover:text-blue cursor-pointer"
               @click="fetchLeads('archived')"
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
        @archived="fetchLeads('active')"
        @unarchived="fetchLeads('archived')"
    >
    </lead>
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
