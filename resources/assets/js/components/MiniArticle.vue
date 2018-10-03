<template>
  <div>
    <div class="relative bg-white shadow-md md:rounded overflow-hidden border-b-4 border-brand hover:border-secondary h-full">
      <a
        :href="'/blog/' + post.slug"
        class="absolute pin hover:shadow-inner z-20"
      />
      <div class="md:overflow-hidden">
        <img
          :src="post.featured_photo_path"
          class="w-auto h-auto min-h-full min-w-full"
        >
      </div>
      <div class="bg-white pb-2">
        <div class="flex flex-col justify-start mb-2 h-72">
          <p class="p-4 px-6 text-center text-brand font-brand text-4xl">
            {{ post.title }}
          </p>
          <p class="py-4 h-full px-6 flex text-left text-grey-dark text-xl items-center">
            {{ article }}
          </p>
        </div>
        <div class="flex flex-wrap items-center justify-center">
          <a
            :href="'/blog/' + post.slug"
            class="facebook text-center w-full no-underline"
            target="_blank"
          >
            <p class="text-center text-brand w-full pb-2 text-white" >
              Read more...
            </p>
          </a>
        </div>
        <div class="mls text-center mt-3 opacity-75 text-white" >
          <p class="text-xs">Posted @ </p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
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
      let truncated = '';

      if (this.post.body.length > limit) {
        truncated = this.post.body.substring(0, limit - 9);
        return truncated + '...';
      }

      return this.post.body;
    }
  }
}
</script>
