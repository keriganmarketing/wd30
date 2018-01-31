<template>
<ul class="list-reset flex justify-end -mt-6">
    <li class="-mb-px mr-1">
        <a class="bg-white inline-block py-2 px-4 font-semibold hover:text-brand cursor-pointer rounded-t border"
            @click="fetchLeads('active')"
            :class="{'active-tab': viewingActiveLeads, 'border-b-grey': !viewingActiveLeads}"
        >
        Active
        </a>
    </li>
    <li class="mr-1">
        <a class="bg-white inline-block py-2 px-4 font-semibold hover:text-brand cursor-pointer rounded-t border"
            @click="fetchLeads('archived')"
            :class="{'active-tab': !viewingActiveLeads, 'border-b-grey': viewingActiveLeads}"
        >
        Archived
        </a>
    </li>
</ul>
</template>

<script>
    export default {
        props: ['viewing-active-leads'],
        methods: {
            fetchLeads(type) {
                this.$emit('fetchleads', type);
            }
        }
    }
</script>
