<template>
  <div class="container mx-auto bg-white flex flex-wrap justify-center mb-8">
    <add-blog-form 
      @submitted="submitted"
    />
    <p class="w-full justify-between flex font-bold items-center text-secondary p-4 border-b border-secondary">
      <span class="text-left w-auto text-3xl font-brand font-bold text-secondary">
        PUBLISHED BLOGS
      </span>
      <small class="text-xs w-auto flex-grow text-right">Click on the blog you want to edit</small>
    </p>
    <div v-for="blog in blogs" :key="blog.id" class="w-full justify-between flex font-bold items-center text-secondary p-4 border-b border-secondary">
      <blog-item :blog="blog" @submitted="submitted" />
    </div>
  </div>

</template>

<script>
import AddBlogForm from './AddBlogForm.vue';
import BlogItem from './BlogItem.vue';
export default {
  components: {
    AddBlogForm,
    BlogItem
  },
  props: {
    dataBlogs: {
      default: () => [],
      type: Array
    }
  },
  data () {
    return {
      blogs: this.dataBlogs
    }
  },
  watch: {
    dataBlogs: function (newValue) {
      this.blogs = newValue;
    }
  },
  methods: {
    submitted() {
      this.$emit('blog-submitted');
    }
  }
}

</script>  

