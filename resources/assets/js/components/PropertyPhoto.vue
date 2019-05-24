<template>
    <div>
        <div
            class="w-full is-4by3 cursor-pointer"
            :style="{ 'background-image': 'url(' + photourl + ')' }"
            style="background-position:center; background-size:cover;"
        />
    </div>
</template>
<script>
export default {
    props: {
        photoid: {
            type: Number,
            default: this.photoid
        },
        photourl: {
            type: String,
            default: this.photourl
        }
    }
}
</script>