<template>
<div class="bg-white flex flex-wrap items-center justify-center pt-4">
    <p class="w-full pt-4">
        <span class="text-xl font-semibold text-left">Note:</span>
        <textarea
            rows="10"
            class="border rounded shadow-inner p-4 w-full"
            v-model="message"
            placeholder="Type your note here..."
        >
        </textarea>
    </p>
    <button class="bg-teal shadow hover:bg-teal-darker w-full px-8 py-4 rounded text-white">Add note</button>
</div>
</template>

<script>
export default {
    data () {
        return {
            lead_id: '',
            message: ''
        }
    }
}
</script>
