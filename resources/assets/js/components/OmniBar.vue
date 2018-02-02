<template>
    <div>
        <input v-model="omni" @focus="onFocus" @blur="onBlur" @keydown.tab="tabPressed" class="block shadow appearance-none w-full border rounded text-grey-darker hover:border-grey h-10 py-2 px-3" name="omniField" type="text" placeholder="City, address, subdivision or zip" >
        <div v-if="showResults" class="block shadow w-full border rounded z-50 absolute text-grey-darker hover:border-grey bg-white h-32 overflow-scroll py-2 px-3">
            <ul class="list-reset mb-px">
                <li v-for="result in results" :key="result.text">
                    <strong><span class="block mb-px">{{ result.text }}</span></strong>
                    <ul class="list-reset mb-2">
                        <li class="hover:bg-teal hover:text-white cursor-pointer py-1"
                            v-for="child in result.children"
                            :key="child.id"
                            @click="onResultsClick(child.text)"
                        >
                            <span class="block ml-2 mb-px">{{ child.text }}</span>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</template>

<script>
class Results {
    constructor () {
        this.results = {
            text: 'Start typing to begin searching...'
        }
    }
}
    export default {
        props: {
            'classNames': this.classNames
        },
        data () {
            return {
                omni: '',
                results: new Results,
                showResults: false
            }
        },
        watch: {
            omni: function (newOmni, oldOmni) {
                if (newOmni.length == 0) {
                    this.results = new Results;
                } else {
                    this.search();
                }
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

                    this.results = [
                        {text: 'Searching...'}
                    ];
                    axios(config)
                    .then(response => {
                        vm.results = response.data.results;
                    })
                },
                250
            ),
            onFocus () {
                this.showResults = true;
            },
            onResultsClick(value) {
                this.omni = value;
                this.showResults = false;
            },
            onBlur() {
                let vm = this;
                setTimeout(function(){
                    vm.showResults = false;
                }, 200);
            },
            tabPressed () {
                this.omni = this.results[0].children[0].text;
            }
        }
    }
</script>
