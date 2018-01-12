<template>
    <div class="container mx-auto p-8 bg-white border-b">
        <p>Name: {{ lead.name }}</p>
        <p>Phone: {{ lead.phone }}</p>
        <p>Email: {{ lead.email }}</p>
        <p>Message: {{ lead.message }}</p>
        <p class="mt-8"><a @click="archive(lead.id)" class="cursor-pointer underline" v-if="viewingActiveLeads">Archive</a></p>
        <p class="mt-8"><a @click="unarchive(lead.id)" class="cursor-pointer underline" v-if="!viewingActiveLeads">Unarchive</a></p>
    </div>
</template>

<script>
    export default {
        props: ['dataLead', 'activeLeads'],
        data () {
            return {
                lead: this.dataLead,
                viewingActiveLeads: this.activeLeads
            }
        },
        methods: {
            archive(id) {
                axios({
                    method: 'patch',
                    url: '/leads/' + id,
                    data: {
                        active: 0
                    }
                })
                .then(response => {
                    this.$emit('archived');
                });
            },
            unarchive(id) {
                axios({
                    method: 'patch',
                    url: '/leads/' + id,
                    data: {
                        active: 1
                    }
                })
                .then(response => {
                    this.$emit('unarchived');
                });
            }
        }
    }
</script>
