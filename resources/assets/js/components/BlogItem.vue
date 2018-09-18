<template>
  <div class="w-full flex flex-wrap items-center">
    <div v-if="! isExpanded" class="w-full flex flex-wrap items-center">
      <img :src="'/storage/' + blog.featured_photo_path" alt="" class="w-1/6 h-auto p-4 border border-secondary rounded justify-center">
      <span class="w-1/2 text-3xl pl-4 text-brand font-brand">{{ blog.title }}</span>
      <button class="bg-brand rounded border border-secondary p-4" @click="toggleEditor">Edit</button>
      <span class="w-1/4 font-sm text-right">{{ diffForHumans(blog.created_at) }}</span>
    </div>
    <div v-else class="w-full flex flex-wrap items-center" >
      <add-blog-form 
        v-if="isExpanded" 
        :data-title="blog.title" 
        :data-body="blog.body" 
        :data-photo-path="'/storage/' + blog.featured_photo_path" 
        :submit-method="{method: 'PATCH', route: '/blog/' + blog.id}" 
        class="w-full"
        @submitted="submitted"
      />
    </div>
  </div>
</template>

<script>
import moment from 'moment';
import AddBlogForm from './AddBlogForm.vue';
export default {
  components: {
    AddBlogForm,
  },
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
