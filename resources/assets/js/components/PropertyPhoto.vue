<template>
  <div>
    <div
      class="w-full is-4by3 cursor-pointer lazy-img-fadein"
      :style="{
        'background-image':
          'url(' + photourl + '); transition: opacity 2.9s linear;',
      }"
      lazy="loading"
      style="background-position: center; background-size: cover"
    >
      <p style="opacity: 0">{{ caption }}</p>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    photoid: {
      type: Number,
      default: this.photoid,
    },
    photourl: {
      type: String,
      default: this.photourl,
    },
    caption: {
      type: String,
      default: "",
    },
  },
};
</script>