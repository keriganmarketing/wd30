<template>
    <div>
        <div class="grid-container">
            <div class="container mx-auto">
                <transition-group
                    tag="div"
                    name="list"
                    mode="out-in"
                    class="w-full flex flex-wrap justify-center items-start min-h-full"
                >
                    <mini-listing
                        class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 py-2 inline-block"
                        v-for="listing in searchResults.data"
                        :key="listing.id"
                        :listing="listing"
                    />
                </transition-group>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        searchResults: {
            type: Object,
            default: this.searchResults
        }
    }
}
</script>

<style>
.list-enter-active, .list-leave-active {
  transition: all 0.4s;
}
.list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
  opacity: 0;
  transform: translateY(200px);
}
.list-move {
    transition: transform .4s;
}
</style>

