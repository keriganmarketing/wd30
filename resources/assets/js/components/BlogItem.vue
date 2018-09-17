<template>
    <div class="w-full flex flex-wrap items-center">
        <div class="w-full flex flex-wrap items-center" v-if="! isExpanded">
            <img :src="'/storage/' + blog.featured_photo_path" alt="" class="w-1/6 h-auto p-4 border border-secondary rounded justify-center">
            <span class="w-1/2 text-3xl pl-4 text-brand font-brand">{{ blog.title }}</span>
            <button class="bg-brand rounded border border-secondary p-4" @click="toggleEditor">Edit</button>
            <span class="w-1/4 font-sm text-right">{{ diffForHumans(blog.created_at) }}</span>
        </div>
        <div class="w-full flex flex-wrap items-center" v-else>
            <add-blog-form 
                 class="w-full"
                  v-if="isExpanded" 
                  :data-title="blog.title" 
                  :data-body="blog.body" 
                  :data-photo-path="'/storage/' + blog.featured_photo_path" 
                  :submit-method="{method: 'post', route: '/blog/' + blog.id}" 
                  @submitted="submitted" />
        </div>
    </div>
</template>

<script>
import moment from 'moment';
export default {
    props: ['blog'],
    data() {
        return {
            isExpanded: false,
        }
    },
    methods: {
        diffForHumans(date) {
            return moment(date).fromNow();
        },
        toggleEditor() {
            this.isExpanded = ! this.isExpanded;
        },
        submitted() {
            this.$emit('submitted');
            this.isExpanded = false;
        }
    }
}

</script>
