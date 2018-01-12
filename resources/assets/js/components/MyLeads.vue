<template>
    <div class="container mx-auto">
        <h1 class="text-xl font-semibold text-center py-8 border-b">
        Leads
        </h1>
        <div class="border-b flex px-8 bg-white shadow mb-2" :key="lead.id" v-for="lead in leads">
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
        mounted() {
            axios.get('/leads')
                .then(response => {
                    this.leads = response.data.data;
                })
        }
    }
</script>
