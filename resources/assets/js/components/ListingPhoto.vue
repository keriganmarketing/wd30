<template>
    <div 
        class="w-full is-4by3 bg-center bg-cover bg-no-repeat"
        v-lazy:background-image="url"
        :style="
            'background-size: ' + size + ';'
        "
    >
        <slot></slot>
    </div>
</template>
<script>
export default {
    props: ['src', 'alt'],
    data() {
        return {
            url: {
                src: this.src,
                error: '/img/nophoto.jpg',
                loading: '',
            },
            size: 'cover'
        }
    }
}
</script>


