<template>
    <div class="w-full">
        <mini-article
            v-for="post in posts"
            :key="post.id"
            :post="post"
            class="w-full md:w-1/4 m-2"
        />
    </div>
</template>

<script>
export default {
    data () {
        return {
            posts: []
        }
    },
    mounted () {
        window.axios.get('/facebook-feed')
            .then(response => {
                this.posts = response.data.posts;
            })
    }
}

</script>
