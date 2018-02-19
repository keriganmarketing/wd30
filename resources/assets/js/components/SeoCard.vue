<template>
    <div class="container mx-auto bg-white flex flex-wrap justify-center">
        <p class="w-full justify-between flex font-bold items-center text-secondary p-4 border-b border-secondary mb-4">
            <span class="text-left w-auto text-3xl font-brand font-bold text-secondary">
                SEO
            </span>
            <small class="text-xs w-auto flex-grow text-right">This is where you will configure how your site will look on Google</small>
        </p>
        <div class="w-full py-2 bg-white flex flex-wrap items-start border-b sm:pr-2 md:pr-4">
            <div class="font-bold w-full sm:w-1/4 md:w-1/6 py-2 px-4 text-left">
                Preview:
            </div>
            <div class="w-2/3 p-4 border rounded bg-white flex flex-wrap items-center justify-center mb-8">
                <p class="google-title w-full">
                    {{ title }}
                </p>
                <small class="w-full google-link">https://karenbranham.beachybeach.com</small>
                <p class="w-full google-description">
                    {{ description }}
                </p>
            </div>
        </div>
        <div class="w-full py-2 bg-white flex flex-wrap items-center border-b sm:pr-2 md:pr-4">
            <div class="font-bold w-1/3 sm:w-1/4 md:w-1/6 py-2 px-4 text-left">
                Site Title:
            </div>
            <input
                type="text"
                class="border rounded border-secondary py-2 md:px-2 bg-white flex-grow text-left"
                v-model="title"
            >
        </div>
        <div class="w-full py-2 bg-white flex flex-wrap items-start border-b sm:pr-2 md:pr-4">
            <div class="font-bold w-full sm:w-1/4 md:w-1/6 py-2 px-4 text-left">
                Site Description:
            </div>
            <textarea
                class="border rounded border-secondary py-2 px-4 md:px-2 bg-white w-full md:w-auto flex-grow text-left"
                rows="3"
                v-model="description"
            />
        </div>
        <div class="w-full py-2 bg-white flex flex-wrap items-center justify-center sm:pr-2 md:pr-4">
            <button class="button-brand w-1/3" @click="submit">Submit</button>
        </div>
    </div>

</template>

<script>
export default {
    data () {
        return {
            id: 0,
            title: '',
            description: ''
        }
    },
    mounted () {
        this.getMetaData();
    },
    methods: {
        submit () {
            window.axios.patch('/metadata/' + this.id, {
                title: this.title,
                description: this.description
            })
                .then(response => {
                    this.id          = response.data.id,
                    this.title       = response.data.title,
                    this.description = response.data.description
                });
        },
        getMetaData () {
            window.axios.get('/metadata').then(response => {
                this.id          = response.data.id,
                this.title       = response.data.title,
                this.description = response.data.description
            });
        }
    }
}

</script>
<style>
.google-title {
    text-decoration: none;
    color: #1a0dab;
    font-size: 18px;
    line-height: 1.2;
    text-align: left;
    font-weight: normal;
    font-family: Roboto, Arial;
    white-space: nowrap;
}
.google-link {
    height: 18px;
    line-height: 16px;
    font-size: 14px;
    color: #006621;
    font-family: Roboto, Arial;
}
.google-description {
    color: #808080;
    line-height: 1.4;
    word-wrap: break-word;
    font-family: Roboto, Arial;
    font-size: small;
}
</style>

