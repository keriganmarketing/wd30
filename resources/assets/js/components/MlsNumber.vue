<template>
<div class="relative">
    <span
        class="text-sm absolute pin-r pin-t pt-1 px-2 w-auto cursor-pointer block text-right"
        @click="deleteNumber"
    >
        x
    </span>
    <span class="w-full block text-center">{{ mlsNumber.mls_id }}</span>
</div>
</template>

<script>
export default {
    props: {
        mlsNumber: {
            type: Object,
            default: () => {}
        }
    },
    methods: {
        deleteNumber () {
            this.$emit('delete-number', this.mlsNumber.id);
        }
    }
}
</script>
