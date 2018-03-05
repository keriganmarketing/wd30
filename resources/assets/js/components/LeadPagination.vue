<template>
<div>
    <ul class="list-reset flex justify-start md:justify-start flex-wrap">
        <li class="w-full text-sm"
           v-if="pagination.total != 0">
           <p class="align-middle font-thin text-smoke-light mb-2 text-center">Showing {{ pagination.from }} - {{ pagination.to }} out of {{ pagination.total }}</p>
        </li>
        <li class="mr-2 w-full flex-1 md:w-auto">
            <button class="text-grey-darker px-4 py-2 text-center cursor-pointer shadow rounded-sm w-full"
               :disabled="pagination.prev_page_url == null"
               :class="{
                   'cursor-not-allowed': pagination.prev_page_url == null,
                   'bg-brand-lightest': pagination.prev_page_url == null,
                   'bg-tan-lightest': pagination.prev_page_url != null
                   }"

               @click="page(pagination.prev_page_url)"
            >
                   Prev
            </button>
        </li>
        <li class="mr-2 flex w-1/8 text-center justify-center">
            <a class="text-grey-darker bg-brand-lightest px-4 py-2 text-center flex shadow items-center rounded-sm w-full"
            >
            <span class="text-center">
            {{ pagination.current_page }}
            </span>
            </a>
        </li>
        <li class="w-full flex-1 md:w-auto">
            <button class="text-grey-darker bg-tan-lightest px-4 py-2 text-center cursor-pointer shadow rounded-sm w-full"
               :disabled="pagination.next_page_url == null"
               :class="{
                   'cursor-not-allowed': pagination.next_page_url == null,
                   'opacity-50': pagination.next_page_url == null
                   }"

               @click="page(pagination.next_page_url)"
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
            page(url) {
                this.$emit('page', url);
            }
        }
    }
</script>
