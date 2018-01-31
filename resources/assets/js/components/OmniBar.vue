<template>
    <div class="flex-auto relative px-2 py-2 w-full sm:w-full md:w-3/5">
        <input v-model="omni" class="block shadow appearance-none w-full border rounded text-grey-darker hover:border-grey h-10 py-2 px-3" name="omniField" type="text" placeholder="City, address, subdivision or zip" >
    </div>
</template>

<script>
    export default {
        data () {
            return {
                omni: '',
                results: []
            }
        },
        watch: {
            omni: function (newOmni, oldOmni) {
                this.search();
            }
        },
        methods: {
            search: _.debounce(
                function () {
                    let vm = this;
                    let config = {
                        method: 'get',
                        url: 'https://mothership.kerigan.com/api/v1/omnibar?search=' + this.omni,
                    };

                    axios(config)
                    .then(response => {
                        vm.results = response.data;
                    })
                },
                250
            )
        }
    }
</script>
