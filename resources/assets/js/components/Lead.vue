<template>
    <div class="container mx-auto flex flex-wrap p-8 bg-white border-b mb-2 shadow rounded">
        <div class="sm:w-full lg:w-1/3 pr-8">
            <p class="w-full py-2 border-b"><strong>Name:</strong> {{ lead.name }}</p>
            <p class="w-full py-2 border-b"><strong>Email:</strong> <a :href="`mailto:${lead.email}`">{{ lead.email }}</a></p>
            <p class="w-full py-2 border-b"><strong>Phone:</strong> <a :href="`tel:${lead.email}`">{{ lead.phone }}</a></p>
        </div>
        <div class="sm:w-full lg:w-2/3 flex flex-wrap items-around">
            <p class="w-full font-bold">Message:</p>
            <p class="w-full bg-grey-lightest p-4 rounded border border-grey">{{ lead.message }}</p>
        </div>
        <p class="mt-8 w-full flex justify-end items-center" v-if="viewingActiveLeads">
            <a @click="archive(lead.id)" class="cursor-pointer hover:text-red text-center mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current h-8 w-8">
                    <path class="heroicon-ui" d="M8 6V4c0-1.1.9-2 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8H3a1 1 0 1 1 0-2h5zM6 8v12h12V8H6zm8-2V4h-4v2h4zm-4 4a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1z"/>
                </svg>
                <span class="block text-xs">Archive</span>
            </a>
            <a @click="archive(lead.id)" class="cursor-pointer hover:text-red text-center mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current h-8 w-8">
                    <path class="heroicon-ui" d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/>
                </svg>
                <span class="block text-xs">Add Note</span>
            </a>
        </p>
        <p class="mt-8" v-if="!viewingActiveLeads">
            <a @click="unarchive(lead.id)" class="cursor-pointer underline">
                Unarchive
            </a>
        </p>
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
