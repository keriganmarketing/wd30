<template>
    <div class="container mx-auto bg-white flex flex-wrap justify-center mb-8">
        <p class="w-full justify-between flex font-bold items-center text-secondary p-4 border-b border-secondary">
            <span class="text-left w-auto text-3xl font-brand font-bold text-secondary">
                ADD BLOG
            </span>
            <small class="text-xs w-auto flex-grow text-right">Click on the text you want to edit</small>
        </p>
        <form enctype="multipart/form-data" class="w-full" @submit.prevent>
            <div class="w-full py-2 bg-white flex flex-wrap items-center border-b">
                <div class="font-bold w-full sm:w-1/4 md:w-1/6 py-2 px-4 text-left">
                    Title:
                </div>
                <input
                    ref="title"
                    v-model="title"
                    :class="{
                        'border-secondary': title
                    }"
                    type="text"
                    class="font-brand text-brand border border-transparent text-3xl py-2 px-4 md:px-2 bg-white w-full md:w-auto flex-grow text-left"
                >
            </div>
            <div class="w-full py-2 bg-white flex flex-wrap items-start border-b pr-2">
                <div class="font-bold w-full sm:w-1/4 md:w-1/6 py-2 px-4 text-left">
                    Body:
                </div>
                <textarea
                    ref="body"
                    v-model="body"
                    :class="{
                        'border-secondary': body
                    }"
                    class="border border-transparent flex items-center py-4 px-4 md:px-2 bg-white w-full md:w-auto flex-grow text-left leading-normal text-grey-darker"
                    rows="5"
                />
            </div>
            <div class="w-full py-2 bg-white flex flex-wrap items-center border-b">
                <div class="font-bold w-1/3 sm:w-1/4 md:w-1/6 py-2 px-4 text-left">
                    Featured Photo:
                </div>
                <div class="px-12 lg:px-4">
                    <input 
                        id="file" 
                        ref="fileInput"
                        type="file" 
                        name="file" 
                        enctype="multipart/form-data"
                        @change="loadFile($event.target.name, $event.target.files)"
                    >
                </div>
            </div>
            <div class="w-full py-2 bg-white flex flex-wrap items-center border-b items-center justify-center">
                <button class="bg-brand p-4 text-uppercase rounded w-1/3 text-white font-brand" @click.prevent="submit">Create Blog</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            title: '',
            body: '',
            blogInfo: new FormData()
        }
    },
    methods: {
        loadFile (name, files) {
            if (! files.length) {
                return;
            }

            this.blogInfo.append(name, files[0], files[0].name);
        },
        submit () {
            this.blogInfo.append('title', this.title);
            this.blogInfo.append('body', this.body);
            window.axios.post('/blog', this.blogInfo)
                .then(response => {
                    this.title = '';
                    this.body = '';
                    this.blogInfo = new FormData();
                    this.$refs.fileInput.value = null;
                })
                .catch(err => {
                    console.log(err);
                })
        }
    }
}

</script>
