<template>
<div>
    <p class="py-4 text-center text-grey-dark">
        Showing {{ searchResults.from.toLocaleString() }} - {{ searchResults.to.toLocaleString() }} of {{ searchResults.total.toLocaleString() }} results
    </p>
    <ul class="list-reset flex justify-center my-2">
        <li class="mr-2">
            <a
                class="text-white bg-primary px-4 py-2 text-center cursor-pointer shadow rounded-l border border-primary"
                @click="firstPage()"
            >
                First
            </a>
        </li>
        <li class="mr-2">
            <a
                class="text-white bg-primary px-4 py-2 text-center cursor-pointer shadow border border-primary"
                @click="prevPage()"
            >
                Prev
            </a>
        </li>
        <li class="mr-2">
            <a class="text-grey bg-white px-4 py-2 text-center shadow items-center border border-grey ">
                {{ searchResults.current_page }}
            </a>
        </li>
        <li class="mr-2">
            <a
                class="text-white bg-primary px-4 py-2 text-center cursor-pointer shadow border border-primary"
                @click="nextPage()"
            >
                Next
            </a>
        </li>
        <li class="mr-2">
            <a
                class="text-white bg-primary px-4 py-2 text-center cursor-pointer shadow rounded-r border border-primary"
                @click="lastPage()"
            >
                Last
            </a>
        </li>
    </ul>
</div>
</template>

<script>
    export default {
        props: {
            searchResults: {
                type: Object,
                default: this.searchResults
            }
        },
        methods: {
            firstPage () {
                if (this.searchResults.currentPage > 1) {
                    this.$emit('first-page')
                    window.scrollTo(0,0);
                }
            },
            prevPage () {
                if (this.searchResults.prev_page_url != null) {
                    this.$emit('prev-page')
                    window.scrollTo(0,0);
                }
            },
            nextPage () {
                if (this.searchResults.next_page_url != null) {
                    this.$emit('next-page')
                    window.scrollTo(0,0);
                }
            },
            lastPage () {
                this.$emit('last-page');
                window.scrollTo(0,0);
            }
        }
    }
</script>
