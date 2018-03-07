<template>
<div class="w-full md:w-3/4 flex flex-wrap justify-center md:justify-start items-center ml-1">
    <mls-number
        v-for="mlsNumber in mlsNumbers"
        :key="mlsNumber.id"
        :mls-number="mlsNumber"
        @delete-number="deleteNumber"
        class="w-2/3 md:w-1/3 lg:w-1/4 flex flex-wrap rounded px-2 py-1 m-1 text-center bg-brand text-white items-center"
    />
    <div class="w-full text-brand flex flex-wrap items-center justify-center md:justify-start h-auto py-2 md:py-0 md:h-12">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="36"
            height="36"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="feather mt-1 feather-plus-circle text-center"
            @click="addingMlsNumber = ! addingMlsNumber"
        >
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="16"></line>
            <line x1="8" y1="12" x2="16" y2="12"></line>
        </svg>
        <input
                type="text"
                class="border border-secondary mx-16 mt-4 md:mt-1 md:mx-2 md:text-xl py-1 px-2 bg-white w-full md:w-1/4 text-center"
                v-model="mls_id"
                v-if="addingMlsNumber"
                @keydown.enter="addNumber"
                @blur="onBlur"
        />
        <span
            class="block w-auto text-cta-red mt-1 py-1 px-1 mx-1"
            v-if="error != ''"
        >
            {{ error }}
        </span>
    </div>
</div>
</template>

<script>
export default {
    data () {
        return {
            mlsNumbers: [],
            addingMlsNumber: false,
            mls_id: '',
            error: ''
        }
    },
    mounted () {
        this.getMlsNumbers();
    },
    methods: {
        getMlsNumbers () {
            window.axios.get('mls-numbers')
                .then(response => {
                    this.mlsNumbers = response.data;
                })
        },
        deleteNumber(id) {
            let vm = this;
            window.axios.delete('/mls-numbers/' + id)
                .then(() => {
                    vm.getMlsNumbers();
            })
        },
        addNumber () {
            let vm = this;
            vm.error = '';
            window.axios.post('/mls-numbers', {
                mls_id: vm.mls_id.toUpperCase()
            })
            .then(response => {
                vm.addingMlsNumber = false;
                vm.mlsNumbers.push(response.data);
            })
            .catch(err => {
                vm.error = vm.ucWords(err.response.data.errors.mls_id[0]);
            })
        },
        onBlur () {
            this.error = '';
            this.addingMlsNumber = false;
        },
        ucWords (str) {
            return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
                return $1.toUpperCase();
            });
        }
    }
}
</script>
