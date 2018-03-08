<template>
    <div>
        <youtube-video
            v-for="video in videos"
            :key="video.id.videoId"
            :video="video"
            class="w-full md:w-1/4 m-2"
        />
    </div>
</template>

<script>
export default {
    data () {
        return {
            videos: []
        }
    },

    mounted () {
        window.axios.get('youtube-gallery')
            .then(response => {
                this.videos = response.data;
            });
    }
}

</script>
