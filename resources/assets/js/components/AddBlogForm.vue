<template>
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
            <wysiwyg v-model="body" />
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

</template>

<script>
export default {
    props: {
        dataTitle: {
            default: '',
            type: String
        },
        dataBody: {
            default: '',
            type: String
        },
        dataPhotoPath: {
            default: '',
            type: String
        },
        submitMethod: {
            default: () => { 
                return { method: 'post', route: '/blog' }
            },
            type: Object
        }
    },
    data() {
        return {
            title: this.dataTitle,
            body: this.dataBody,
            photoPath: this.dataPhotoPath,
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
            this.blogInfo.append('_method', 'PATCH');
            window.axios({
                method: this.submitMethod.method,
                url: this.submitMethod.route,
                data: this.blogInfo
            })
                .then(response => {
                    this.title = '';
                    this.body = '';
                    this.blogInfo = new FormData();
                    this.$refs.fileInput.value = null;
                    this.$emit('submitted');
                })
                .catch(err => {
                    console.log(err);
                })
        }
    }
}

</script>
