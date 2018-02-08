<template>
    <div class="fixed z-50 pin bg-smoke-darker" v-if="modalOpen" >
        <div class="fixed inline-block p-4 pin-t pin-r bg-smoke-dark text-white cursor-pointer" @click="closeModal" >CLOSE</div>
        <slot></slot>
    </div>
</template>
<script>
export default {
    props: {
        modalOpen: false
    },
    methods: {
        closeModal(){
            this.$parent._data.modalOpen = false;
        }
    }
}
</script>