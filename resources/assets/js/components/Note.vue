<template>
    <div class="w-full mb-4 shadow">
        <div class="w-full bg-grey p-8 text-grey-darkest">
            {{ note.message }} - <small>{{ note.diff }}</small>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        note: {
            type: Object,
            default: () => {}
        }
    }
}
</script>
