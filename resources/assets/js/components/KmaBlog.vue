<template>
  <div class="container mx-auto bg-white flex flex-wrap justify-center mb-8">
    <p class="w-full justify-between flex font-bold items-center text-secondary p-4 border-b border-secondary">
      <span class="text-left w-auto text-3xl font-brand font-bold text-secondary">
        ADD BLOG POST
      </span>
      <small class="text-xs w-auto flex-grow text-right">Click on the text you want to edit</small>
    </p>
    <blog-list 
      :data-blogs="blogs"
      @blog-submitted="fetchBlogs"
      @delete-blog="deleteBlog"
    />
  </div>
</template>

<script>
import BlogList from './BlogList.vue';
export default {
  components: {
    BlogList,
  },
  data() {
    return {
      blogs: []            
    }
  },
  mounted() {
    this.fetchBlogs();
  },
  methods: {
    fetchBlogs() {
      window.axios
        .get('/blog')
        .then(response => {
          this.blogs = response.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    deleteBlog(id) {
      window.axios
        .delete('/blog/' + id)
        .then(() => {
          this.fetchBlogs();
        })
        .catch(err => {
          console.log(err);
        });

    }
  }
}

</script>
