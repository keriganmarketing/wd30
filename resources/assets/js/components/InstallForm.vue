<template>
    <div class="container mx-auto bg-white flex flex-wrap justify-center">
        <p class="w-full justify-center flex font-bold items-center text-secondary p-4 border-b border-secondary">
            <span class="text-center w-auto text-2xl text-brand">
                Welcome to your new site! <br/> We just need a couple of things to get started.
            </span>
        </p>
        <div class="w-full py-4 bg-white flex flex-wrap items-center justify-center border-b">
            <div class="font-bold w-1/3 sm:w-1/4 md:w-1/6 py-2 text-right">
                Your Name:
            </div>
            <input
                type="text"
                class="border border-brand ml-4 md:text-xl py-2 md:px-2 bg-white w-1/2 text-left"
                v-model="name"
            >
        </div>
        <div class="w-full py-4 bg-white flex flex-wrap items-center justify-center border-b">
            <div class="font-bold w-1/3 sm:w-1/4 md:w-1/6 py-2 text-right">
                Your Email:
            </div>
            <input
                type="text"
                class="border border-brand ml-4 md:text-xl py-2 md:px-2 bg-white w-1/2 text-left"
                v-model="email"
            >
        </div>
        <div class="w-full py-4 bg-white flex flex-wrap items-center justify-center border-b">
            <div class="font-bold w-1/3 sm:w-1/4 md:w-1/6 text-right">
                Company/Broker:
            </div>
            <input
                type="text"
                class="border border-brand ml-4 md:text-xl py-2 md:px-2 bg-white w-1/2 text-left"
                v-model="company"
            >
        </div>
        <div class="w-full bg-white flex flex-wrap h-16 items-center">
            <button
                class="bg-brand-dark text-white shadow appearance-none inline-block border-brand-darkest .px-3 .py-2 w-full h-16 text-3xl font-bold"
                @click="install"
            >
                BUILD MY SITE
            </button>
        </div>
    </div>
</template>
<script>
export default {
    data () {
        return {
            name: '',
            email: '',
            company: '',
            building: false
        }
    },
    methods: {
        install () {
            this.building = true;
            window.axios.post('/install', {
                name: this.name,
                email: this.email,
                company: this.company
            })
                .then(response => {
                    console.log(response.data);
                });
        }
    }
}
</script>
