<template>
    <div class="fixed pin bg-smoke-darkest z-50" v-if="modalOpen">
        <div 
            tabindex="0"
            ref="closeButton"
            class="fixed inline-block p-4 pin-t pin-r bg-primary text-white cursor-pointer" 
            @click="closeModal" 
            @keydown.esc="closeModal"
        >CLOSE</div>
        <slot />
    </div>
</template>
<script>
export default {
    props: {
        modalOpen: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        closeModal(){
            this.$parent._data.modalOpen = false;
            setTimeout(function(){
                this.$root.$refs['content'].focus()
            }, 200);
        }
    }
}
</script>