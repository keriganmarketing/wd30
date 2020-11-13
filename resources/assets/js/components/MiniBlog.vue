<template>
  <div>
    <div class=" relative flex flex-col bg-white shadow-md md:rounded overflow-hidden border-b-4 border-primary hover:border-secondary h-full">
      <div class="md:overflow-hidden">
        <a
        :href="'/blog/' + post.slug"
        >
        <img
          :src="post.featured_photo_path"
          class="w-auto h-auto min-h-full min-w-full"
          :alt="'Photo of' + post.title"
        ></a>
      </div>
      <div class="bg-white flex flex-col justify-between flex-grow">
        <div class="title-area">
          <p class="p-4 px-6 text-center text-primary font-brand text-4xl" tabindex="0">
            {{ post.title }}
          </p>
          <p class="text-xs text-center text-grey" tabindex="0">posted {{ postDate }} </p>
        </div>
        <div class="article-area">
          <p class="py-4 px-6 text-center text-grey-dark font-normal text-lg leading-normal" tabindex="0">
            {{ article }}
          </p>
        </div>
        <div class="cta-area">
          <p class="pb-4 px-6 text-center mt-auto ">
              <a 
                  :href="'/blog/' + post.slug"
                  tabindex="0"
                  target="_blank"
                  title="Read full article"
                  class="text-primary button-primary w-auto"
              >Read the full article</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
let moment = require('moment');

export default {
  props: {
    post: {
      type: Object,
      default: () => {}
    }
  },
  computed: {
    article: function () {
      let limit = 200;
      let string = this.post.body;
      let truncated = '';
      let stripedHtml = string.replace(/<[^>]+>/g, '');

      if (stripedHtml.length > limit) {
        truncated = stripedHtml.substring(0, limit - 9);
        return truncated + '...';
      }

      return stripedHtml;
    },
    postDate: function () {
      let date = this.post.updated_at
      return moment(date).format('MMMM D, YYYY');
    }
  }
}
</script>
