<template>
    <div class="container mx-auto">
        <h1 class="text-xl font-semibold text-center py-8 border-b">
        Leads
        </h1>
        <div class="border-b flex flex-wrap px-8 bg-white shadow mb-2" :key="lead.id" v-for="lead in leads" v-if="lead.active">
            <div class="pl-4 py-4 w-1/3">
                <span class="p-2 block"><strong>Name:</strong> {{ lead.name }} - <small>{{ lead.diff }}</small></span>
                <span class="p-2 block">
                    <strong>Email: </strong>
                    <!--NOTE THE BACTICKS -->
                    <a :href="`mailto:${lead.email}`">
                        {{ lead.email }}
                    </a>
                </span>
                <span class="p-2 block">
                    <strong>Phone: </strong>
                    <!--NOTE THE BACTICKS -->
                    <a :href="`tel:${lead.phone}`">
                        {{ lead.phone }}
                    </a>
                </span>
            </div>
            <div class="p-8 bg-grey-lightest my-4 w-2/3">
               {{ lead.message }}
            </div>
            <div class="p-4 w-full">
                <a class="cursor-pointer text-blue" @click="sendToArchive(lead.id)">Archive</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                leads: []
            }
        },
        methods: {
            sendToArchive(id) {
                axios({
                    method: 'patch',
                    url: '/leads/' + id,
                    data: {
                        active: 0
                    }
                })
                .then(response => {
                    this.getLeads();
                })
            },
            getLeads() {
                axios.get('/leads')
                    .then(response => {
                        this.leads = response.data.data;
                    });
            }
        },
        mounted() {
            this.getLeads();
        }
    }
</script>
