<template>
    <div class="container mx-auto bg-white flex flex-wrap justify-center mb-8">
        <p class="w-full justify-between flex font-bold items-center text-secondary p-4 border-b border-secondary">
            <span class="text-left w-auto text-3xl font-brand font-bold text-secondary">
                CONTENT
            </span>
            <small class="text-xs w-auto flex-grow text-right">Click on the text you want to edit</small>
        </p>
        <div class="w-full py-2 bg-white flex flex-wrap items-center border-b">
            <div class="font-bold w-full sm:w-1/4 md:w-1/6 py-2 px-4 text-left">
                Tagline:
            </div>
            <input
                ref="tagline"
                v-model="content.title"
                :class="{
                    'border-secondary': tagline
                }"
                type="text"
                class="font-brand text-primary border border-transparent text-3xl py-2 px-4 md:px-2 bg-white w-full md:w-auto flex-grow text-left"
                @focus="edit('tagline')"
                @blur="submit('tagline')"
            >
        </div>
        <div class="w-full py-2 bg-white flex flex-wrap items-start border-b pr-2">
            <div class="font-bold w-full sm:w-1/4 md:w-1/6 py-2 px-4 text-left">
                Body:
            </div>
            <trumbowyg 
                ref="body"
                :class="{
                    'border-secondary': body
                }"
                v-model="content.body" 
                :config="editorconfig" 
                class="border border-transparent py-4 px-4 md:px-2 bg-white w-full md:w-auto flex-grow text-left leading-normal text-grey-darker"
                name="contentbody"
                @tbw-blur="submit('body')"
            ></trumbowyg>
            
        </div>
        <div class="w-full py-2 bg-white flex flex-wrap items-center border-b">
            <div class="font-bold w-1/3 sm:w-1/4 md:w-1/6 py-2 px-4 text-left">
                Header Photo:
            </div>
            <div class="px-12 lg:px-4">
                <header-photo-upload :header-photo-path="content.header_photo_path" />
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        dataContent: {
            type: Object,
            default: () => {}
        }
    },
    data() {
        return {
            tagline: false,
            body: false,
            editorconfig: {
                autogrow: true
            }
        }
    },
    computed: {
        content: function () {
            return this.dataContent;
        }
    },
    methods: {
        edit(key) {
            this[key] = true;
            this.$refs[key].select();
        },
        submit (key) {
            this[key] = false;
            this.$emit('content-edited', this.content);
        }
    }
}
</script>
