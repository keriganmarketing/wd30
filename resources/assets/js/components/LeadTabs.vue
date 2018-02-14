<template>
    <div class="w-full flex items-between h-auto">
        <input
            type="checkbox"
            id="activeToggle"
            :checked="activeFilter"
            @change="toggle('activeFilter')"
        />
        <label class="active-toggle" for="activeToggle">
            Active
        </label>
        <input
            type="checkbox"
            id="importantToggle"
            :checked="importantFilter"
            @change="toggle('importantFilter')"
        />
        <label class="important-toggle" for="importantToggle">
            Important
        </label>
    </div>
</template>

<script>
export default {
    props: {
        activeFilter: {
            type: Boolean,
            default: true
        },
        importantFilter: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        toggle(attribute) {
            this.$emit('toggle', attribute);
        }
    }
}
</script>

<style>
</style>

