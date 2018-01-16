<template>
    <div class="container mx-auto flex flex-wrap py-4 px-8 bg-white border-b mb-2 shadow rounded">
        <div class="w-full mb-4 flex justify-start">
            <small class="text-teal opacity-80"><em>{{ lead.diff }}</em></small>
        </div>
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
            <a class="cursor-pointer hover:text-green text-center mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current h-8 w-8">
                    <path class="heroicon-ui" d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/>
                </svg>
                <span class="block text-xs">Add Note</span>
            </a>
            <a @click="toggleImportant(lead.id)"
               class="cursor-pointer hover:text-red text-center mr-4"
               :class="{'text-red': lead.important}"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current h-8 w-8">
                    <path class="heroicon-ui" d="M6.1 21.98a1 1 0 0 1-1.45-1.06l1.03-6.03-4.38-4.26a1 1 0 0 1 .56-1.71l6.05-.88 2.7-5.48a1 1 0 0 1 1.8 0l2.7 5.48 6.06.88a1 1 0 0 1 .55 1.7l-4.38 4.27 1.04 6.03a1 1 0 0 1-1.46 1.06l-5.4-2.85-5.42 2.85zm4.95-4.87a1 1 0 0 1 .93 0l4.08 2.15-.78-4.55a1 1 0 0 1 .29-.88l3.3-3.22-4.56-.67a1 1 0 0 1-.76-.54l-2.04-4.14L9.47 9.4a1 1 0 0 1-.75.54l-4.57.67 3.3 3.22a1 1 0 0 1 .3.88l-.79 4.55 4.09-2.15z"/>
                </svg>
                <span class="block text-xs">Important</span>
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
        props: ['lead', 'activeLeads', 'currentPage'],
        data () {
            return {
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
                    this.$emit('archived', this.currentPage);
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
                    this.$emit('unarchived', this.currentPage);
                });
            },
            toggleImportant(id) {
                let url = '';
                let page = '';
                let important = ! this.lead.important;
                axios({
                    method: 'patch',
                    url: '/leads/' + id,
                    data: {
                        important: important
                    }
                })
                .then(response => {
                    url = this.viewingActiveLeads ? 'active' : 'archived';
                    page = this.currentPage;
                    this.$emit('important', url, page);
                })
            }
        }
    }
</script>
