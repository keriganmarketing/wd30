<template>
    <div>
        <div class="w-full is-4by3 cursor-pointer"
             :style="{ 'background-image': 'url(' + this.photourl + ')' }"
             style="background-position:center; background-size:cover;"
             @click="$parent.openPhotoViewer(this.photoid)" ></div>
    </div>
</template>
<script>
export default {
    props: {
        photoid: this.photoid,
        photourl: this.photourl
    },
}
</script>