<template>
    <div class="w-full h-full border flex flex-wrap bg-white p-4 text-teal-darker shadow">
        <p class="text-lg w-full text-teal-darker p-4 border-b">
            Name: <span class="p-2 text-left" v-if="!editing">{{ user.name }}</span>
            <input type="text" class="border rounded shadow-inner p-1 text-left" v-model="user.name" v-if="editing">
        </p>
        <p class="text-lg w-full text-teal-darker p-4 border-b">
            Email: <span class="" v-if="!editing">{{ user.email }}</span>
            <input type="text" class="border rounded shadow p-1 text-left" v-model="user.email" v-if="editing">
        </p>
        <p class="text-lg w-full text-teal-darker p-4 border-b">
            Phone: <span class="" v-if="!editing">{{ user.phone_number }}</span>
            <input type="text" class="border rounded shadow p-1 text-left" v-model="user.phone_number" v-if="editing">
        </p>
        <p class="text-lg w-full text-teal-darker p-4 border-b">
            MLS ID: <span class="" v-if="!editing">{{ user.mls_id }}</span>
            <input type="text" class="border rounded shadow p-1 text-left" v-model="user.mls_id" v-if="editing">
        </p>
        <p class="text-lg w-full text-teal-darker p-4" v-if="!editing">
            <span class="block w-1/3 mb-2">Address: </span>
            <span class="block w-2/3 mb-2" v-html="formattedAddress">
            </span>
        </p>
        <div class="text-lg w-full text-teal-darker flex flex-wrap py-4" v-if="editing">
            <span class="block w-full ml-4 mb-4">Address: </span>
            <textarea rows="2" v-model="user.address" class="border rounded shadow p-4 text-left w-full">
            </textarea>        </div>
        <button class="bg-teal w-full pin-b text-white px-8 py-2 rounded float-right" @click="editButtonClick" v-if="!editing">Edit</button>
        <button class="bg-teal w-full pin-b text-white px-8 py-2 rounded float-right" @click="submitButtonClick" v-if="editing">Submit</button>
    </div>
</template>

<script>
    export default {
        props: ['data-user'],
        data() {
            return {
                editing: false,
            }
        },
        methods: {
            editButtonClick () {
                this.editing = true;
            },
            submitButtonClick () {
                this.$emit('submit-button-clicked', this.user);
                this.editing = false;
            }
        },
         computed: {
             user: function () {
                 return this.dataUser;
             },
             formattedAddress: function () {
                 return this.user.address.replace(new RegExp('\r?\n', 'g'), '<br>');
             }
         }
    }
</script>
