<template>
  <div class="w-full flex flex-wrap items-center">
    <form class="w-full flex flex-wrap items-center">
      <label :for="'blog_' + blog.id" class="w-1/6">
        <img 
          v-if="updatedImage !== ''" 
          :src="updatedImage" 
          alt="Featured photo" 
          class="w-full h-auto"
        >
        <input 
          :id="'blog_' + blog.id"
          :ref="'blog_' + blog.id"
          type="file" 
          enctype="multipart/form-data"
          class="hidden"
          @change="loadFile($event.target)"
        >
      </label>
      <div class="w-5/6 flex flex-wrap">
        <input 
          v-if="isExpanded" 
          v-model="blog.title" 
          :class="{'border border-brand': editTitle}"
          type="text"  
          class="w-full text-4xl pl-4 text-brand font-brand mb-4" 
          autofocus
        >
        <span 
          v-else 
          class="w-5/6 text-5xl pl-4 text-brand font-brand mb-4" 
          @click="toggleEditor" 
        >
          {{ blog.title }}
        </span>
        <div class="w-full rounded flex flex-wrap justify-start items-end bg-grey-lighter py-4">
          <button v-if="isExpanded" class="p-2 border border-brand w-1/4 mx-4 bg-secondary text-white text-md" @click.prevent="toggleEditor">Hide Content</button>
          <button class="p-2 border border-brand w-1/4 mx-4 bg-red text-white text-md" @click.prevent="deleteBlog" >Delete</button>
        </div>
      </div>
      <span class="w-full font-xs text-right">Last updated: {{ diffForHumans(blog.updated_at) }}</span>
    </form>
    <div v-if="isExpanded" class="w-full flex flex-wrap items-center" >
      <wysiwyg v-model="blog.body" />
    </div>
    <div v-if="isExpanded" class="w-full flex justify-center items-center my-2">
      <button class="bg-brand p-4 text-uppercase rounded w-1/3 text-white font-brand text-3xl" @click.prevent="updateBlog">Update</button>
    </div>
  </div>
</template>

<script>
import moment from 'moment';
export default {
  props: { 
    blog: { 
      type: Object, 
      default: () => {} 
    } 
  },
  data() {
    return {
      isExpanded: false,
      editTitle: false,
      updatedImage: this.blog.featured_photo_path,
      updatedImageName: '',
      updated: new FormData()
    }
  },
  methods: {
    diffForHumans(date) {
      return moment(date).fromNow();
    },
    toggleEditor() {
      this.isExpanded = ! this.isExpanded;
    },
    deleteBlog() {
      this.$emit('delete-blog', this.blog.id);
    },
    updateBlog() {
      this.updated.append('title', this.blog.title);
      this.updated.append('body', this.blog.body);
      this.updated.append('_method', 'PATCH');
      window.axios({
        method: 'POST',
        url: '/blog/' + this.blog.id,
        data: this.updated
      })
        .then(() => {
          this.updated = new FormData();
          this.$emit('submitted');
          this.isExpanded = false;
        })
        .catch(err => {
          alert(err);
        })
    },
    loadFile (image) {
      if (! image.files.length) {
        return;
      }
      
      this.updatedImageName = image.files[0].name;
      this.updatedImage = URL.createObjectURL(image.files[0]);

      this.updated.append('file', image.files[0], image.files[0].name);
    },

  }
}

</script>
