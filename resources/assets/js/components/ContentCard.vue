<template>
    <div class="container mx-auto bg-white flex flex-wrap justify-center">
        <p class="w-full justify-between flex font-bold items-center text-secondary p-4 border-b border-secondary">
            <span class="text-left w-1/2 text-3xl font-brand font-bold text-secondary">
                CONTENT
            </span>
            <small class="text-xs w-1/2 text-right">Click on the text you want to edit</small>
        </p>
        <div class="w-full py-2 pl-2 bg-white flex flext-wrap items-center border-b">
            <div class="w-1/6 py-2 px-4 text-center">
                Tagline:
            </div>
            <input
                type="text"
                class="font-semibold font-brand text-brand border border-transparent text-3xl py-2 bg-white w-4/5 text-left"
                :class="{
                    'border-secondary': tagline
                }"
                ref="tagline"
                v-model="content.title"
                @focus="edit('tagline')"
                @blur="submit('tagline')"
            >
        </div>
        <div class="w-full py-2 pl-2 bg-white flex flext-wrap items-start border-b">
            <div class="w-1/6 py-4 px-2 text-center">
                Body:
            </div>
            <textarea
                class="border border-transparent flex items-center py-4 px-2 bg-white w-3/4 text-left"
                :class="{
                    'border-secondary': body
                }"
                ref="body"
                v-model="content.body"
                @focus="edit('body')"
                @blur="submit('body')"
                rows="8"
            />
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
