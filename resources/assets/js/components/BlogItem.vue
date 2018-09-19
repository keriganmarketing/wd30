<template>
  <div class="w-full flex flex-wrap items-center">
    <form class="w-full flex flex-wrap items-center">
      <input v-model="blog.featured_photo_path" type="hidden">
      <div class="w-1/6">
        <img :src="'/storage/' + blog.featured_photo_path" alt="" class="w-full h-auto p-4 border border-secondary rounded justify-center">
      </div>
      <div class="w-5/6 flex flex-wrap">
        <input 
          v-if="editTitle" 
          v-model="blog.title" 
          :class="{'border border-brand': editTitle}"
          type="text"  
          class="w-full text-4xl pl-4 text-brand font-brand mb-4" 
          autofocus
        >
        <span 
          v-else 
          class="w-5/6 text-5xl pl-4 text-brand font-brand mb-4" 
          @click="editTitle = true" 
        >
          {{ blog.title }}
        </span>
        <div class="w-full rounded flex flex-wrap justify-start items-end bg-grey-lighter py-4">
          <button class="p-2 border border-brand w-1/4 mx-4 bg-secondary text-white text-md" @click.prevent="toggleEditor">Show Content</button>
          <button class="p-2 border border-brand w-1/4 mx-4 bg-red text-white text-md" @click.prevent="deleteBlog" >Delete</button>
        </div>
      </div>
      <span class="w-full font-xs text-right">Last updated: {{ diffForHumans(blog.updated_at) }}</span>
    </form>
    <div v-if="isExpanded" class="w-full flex flex-wrap items-center" >
      <wysiwyg v-model="blog.body" />
    </div>
    <div v-if="isExpanded" class="w-full flex justify-center items-center my-2">
      <button class="bg-brand p-4 text-uppercase rounded w-1/3 text-white font-brand text-3xl" @click.prevent="submitted">Update</button>
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
      editTitle: false,
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
    },
    deleteBlog() {
      this.$emit('deleteBlog', this.blog.id);
    }
  }
}

</script>
