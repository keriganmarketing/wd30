<template>
<div>
    <p class="mb-4 font-semibold text-grey-darker">Showing {{ pagination.from }} - {{ pagination.to }} out of {{ pagination.total }}</p>
    <ul class="list-reset flex justify start">
        <li class="mr-2">
            <button class="text-blue bg-white px-4 py-2 text-center cursor-pointer shadow"
               :disabled="pagination.prev_page_url == null"
               :class="{
                   'cursor-not-allowed': pagination.prev_page_url == null,
                   'opacity-50': pagination.prev_page_url == null
                   }"

               @click="fetchLeads(pagination.prev_page_url)"
            >
                   Prev
            </button>
        </li>
        <li class="mr-2">
            <a class="text-blue bg-white px-4 py-2 text-center flex shadow items-center"
            >
            {{ pagination.current_page }}
            </a>
        </li>
        <li class="mr-2">
            <button class="text-blue bg-white px-4 py-2 text-center cursor-pointer shadow"
               :disabled="pagination.next_page_url == null"
               :class="{
                   'cursor-not-allowed': pagination.next_page_url == null,
                   'opacity-50': pagination.next_page_url == null
                   }"

               @click="fetchLeads(pagination.next_page_url)"
            >
                   Next
            </button>
        </li>
    </ul>
</div>
</template>

<script>
    export default {
        props: ['pagination'],
        methods: {
            fetchLeads(type) {
                this.$emit('fetchleads', type);
            }
        }
    }
</script>
