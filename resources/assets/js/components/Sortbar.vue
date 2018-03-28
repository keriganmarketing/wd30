<template>
<div class="flex flex-wrap justify-center md:justify-between items-center">
    <div class="w-auto flex-grow">
        <p class="py-4 px-2 text-center md:text-left text-grey-darker">
            Showing {{ dataFrom }} - {{ dataTo }} of {{ dataTotal }} results
        </p>
    </div>
    <div class="w-auto flex-grow text-right">
        <div class="flex flex-wrap h-full items-center justify-end pr-2">
            <div class="flex w-auto mb-2 block items-center justify-end rounded">
                <select name="sq_ft" v-model="selected" @change="onChange" class="block shadow appearance-none w-full border rounded text-grey-darker hover:border-grey justify-end h-10 px-3 py-2 pr-8">
                    <option disabled value="">Sort By:</option>
                    <option>Newest</option>
                    <option>Oldest</option>
                    <option>Price - Lo to Hi</option>
                    <option>Price - Hi to Lo</option>
                </select>
                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg
                            class="fill-current h-4 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            style="enable-background:new 0 0 20 20; width: 20px;"
                            xml:space="preserve"
                    >
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: {
        dataFrom: {
            type: Number,
            default: this.dataFrom
        },
        dataTo: {
            type: Number,
            default: this.dataTo
        },
        dataTotal: {
            type: Number,
            default: this.dataTotal
        }
    },
    data () {
        return {
            selected: 'Newest'
        }
    },
    methods: {
        onChange() {
            let sortBy = '';
            let orderBy = '';
            switch(this.selected) {
                case 'Newest':
                    sortBy = 'date_modified';
                    orderBy = 'DESC';
                    break;
                case 'Oldest':
                    sortBy = 'date_modified';
                    orderBy = 'ASC';
                    break;
                case 'Price - Lo to Hi':
                    sortBy = 'price';
                    orderBy = 'ASC';
                    break;
                case 'Price - Hi to Lo':
                    sortBy = 'price';
                    orderBy = 'DESC';
                    break;
            }

            this.$emit('new-sort', sortBy, orderBy);
        }
    }
}
</script>
