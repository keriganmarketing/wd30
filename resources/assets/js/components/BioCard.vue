<template>
    <div class="w-1/3 border flex flex-wrap bg-white p-4 text-teal-darker shadow">
        <p class="text-xl w-full text-teal-darker p-4 border-b">
            Name: <span class="p-2 text-left" v-if="!editing">{{ name }}</span>
            <input type="text" class="border rounded shadow-inner p-1 text-left" v-model="name" v-if="editing">
        </p>
        <p class="text-xl w-full text-teal-darker p-4 border-b">
            Email: <span class="" v-if="!editing">{{ email }}</span>
            <input type="text" class="border rounded shadow p-1 text-left" v-model="email" v-if="editing">
        </p>
        <p class="text-xl w-full text-teal-darker p-4 border-b">
            Phone: <span class="" v-if="!editing">{{ phone }}</span>
            <input type="text" class="border rounded shadow p-1 text-left" v-model="phone" v-if="editing">
        </p>
        <p class="text-xl w-full text-teal-darker p-4 border-b">
            MLS ID: <span class="" v-if="!editing">{{ mlsNumber }}</span>
            <input type="text" class="border rounded shadow p-1 text-left" v-model="mlsNumber" v-if="editing">
        </p>
        <p class="text-xl w-full text-teal-darker p-4" v-if="!editing">
            <span class="block w-1/3">Address: </span>
            <span class="block w-2/3">
                {{ address }}
            </span>
        </p>
        <div class="text-xl w-full text-teal-darker flex flex-wrap py-4 justify-around" v-if="editing">
            <span class="block w-full">Address: </span>
            <textarea rows="8" v-model="address" class="border rounded shadow p-1 text-left w-full">
            </textarea>
        </div>
        <button class="bg-teal w-full pin-b text-white px-8 py-2 rounded float-right" v-text="buttonText" @click="buttonClick"></button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                id: '',
                name: '',
                email: '',
                phone: '',
                address: '',
                mlsNumber: '',
                editing: false
            }
        },
        computed: {
            buttonText: function () {
                return this.editing ? 'Submit' : 'Edit';
            }
        },
        methods: {
            buttonClick () {
                axios({
                    method: 'patch',
                    url: '/users/' + this.id,
                    data: {
                        name:         this.name,
                        email:        this.email,
                        address:      this.address,
                        mls_id:       this.mlsNumber,
                        phone_number: this.phone
                    }
                })
                .then(response => {
                    this.name      = response.data.name;
                    this.email     = response.data.email;
                    this.address   = response.data.address;
                    this.mlsNumber = response.data.mls_id;
                    this.phone     = response.data.phone_number;
                });
                this.editing = !this.editing;
            }
        },
        mounted() {
            axios.get('/authenticate')
                .then(response => {
                    this.id        = response.data.id;
                    this.name      = response.data.name;
                    this.email     = response.data.email;
                    this.phone     = response.data.phone_number;
                    this.mlsNumber = response.data.mls_id;
                    this.address   = response.data.address;
                })
        }
    }
</script>
