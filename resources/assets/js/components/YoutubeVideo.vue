<template>
    <div>
        <div class="relative bg-white shadow-md md:rounded overflow-hidden border-b-4 border-primary hover:border-secondary h-full">
            <div class="md:h-52 md:overflow-hidden" v-if="! playVideo">
                <div
                class="absolute flex w-full h-52 items-center justify-center text-red"
                @click="getVideo"
                @keydown.enter="openVideo()"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 48" version="1.1" width="48px" height="48px">
                        <path style=" fill:#FF3D00;" d="M 43.199219 33.898438 C 42.800781 36 41.101563 37.601563 39 37.898438 C 35.699219 38.398438 30.199219 39 24 39 C 17.898438 39 12.398438 38.398438 9 37.898438 C 6.898438 37.601563 5.199219 36 4.800781 33.898438 C 4.398438 31.601563 4 28.199219 4 24 C 4 19.800781 4.398438 16.398438 4.800781 14.101563 C 5.199219 12 6.898438 10.398438 9 10.101563 C 12.300781 9.601563 17.800781 9 24 9 C 30.199219 9 35.601563 9.601563 39 10.101563 C 41.101563 10.398438 42.800781 12 43.199219 14.101563 C 43.601563 16.398438 44.101563 19.800781 44.101563 24 C 44 28.199219 43.601563 31.601563 43.199219 33.898438 Z "/>
                        <path style=" fill:#FFFFFF;" d="M 20 31 L 20 17 L 32 24 Z "/>
                    </svg>
                </div>
                <img
                    v-if="thumbnail != ''"
                    class="w-auto h-auto min-h-full min-w-full"
                    :src="thumbnail"
                    :alt="video.snippet.title"
                    tabindex="0"
                >
            </div>
            <div class="md:h-52 md:overflow-hidden w-full" v-if="playVideo">
                <iframe
                        ref="video"
                        :src="src"
                        style="border:none;overflow:hidden"
                        allow="autoplay"
                        scrolling="no"
                        frameborder="0"
                        allowTransparency="true"
                        allowFullScreen="true"
                        width="100%"
                        height="225">
                </iframe>
            </div>
            <div class="md:h-52 pb-2 flex flex-col" tabindex="0">
                <h3 class="p-4 px-6 text-2xl text-primary">{{ video.snippet.title }}</h3>
                <p class="px-6 text-grey-darkest text-sm text-left flex-grow">
                    {{ video.snippet.description }}
                </p>
                <p class="p-4 px-6 text-grey-darkest text-sm text-left mt-auto ">
                    <button 
                        tabindex="0"
                        class="text-primary button-primary w-auto"
                        @click="getVideo"
                        @keydown.enter="openVideo()"
                    >Watch Video</button>
                </p>

            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        video: {
            type: Object,
            default: this.video
        }
    },
    data () {
        return {
            playVideo: false,
            src: '',
            thumbnail: this.video.snippet.thumbnails.medium.url,
        }
    },
    methods: {
        getVideo () {
            this.playVideo = true;
            this.src = 'https://youtube.com/embed/' + this.video.id.videoId + '?playsinline=1&autoplay=1';
        },
        openVideo() {
            this.playVideo = true
            this.$refs['video'].focus()
        }
    }
}
</script>
