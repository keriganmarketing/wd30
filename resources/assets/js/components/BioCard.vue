<template>
    <div class="w-1/3 border flex flex-wrap bg-white p-4 text-teal-darker shadow">
        <p class="text-xl w-full text-teal-darker p-4 border-b">
            Name: <span class="p-2 text-left" v-if="!editing">{{ user.name }}</span>
            <input type="text" class="border rounded shadow-inner p-1 text-left" v-model="user.name" v-if="editing">
        </p>
        <p class="text-xl w-full text-teal-darker p-4 border-b">
            Email: <span class="" v-if="!editing">{{ user.email }}</span>
            <input type="text" class="border rounded shadow p-1 text-left" v-model="user.email" v-if="editing">
        </p>
        <p class="text-xl w-full text-teal-darker p-4 border-b">
            Phone: <span class="" v-if="!editing">{{ user.phone }}</span>
            <input type="text" class="border rounded shadow p-1 text-left" v-model="user.phone" v-if="editing">
        </p>
        <p class="text-xl w-full text-teal-darker p-4 border-b">
            MLS ID: <span class="" v-if="!editing">{{ user.mlsNumber }}</span>
            <input type="text" class="border rounded shadow p-1 text-left" v-model="user.mlsNumber" v-if="editing">
        </p>
        <p class="text-xl w-full text-teal-darker p-4" v-if="!editing">
            <span class="block w-1/3">Address: </span>
            <span class="block w-2/3">
                {{ user.address }}
            </span>
        </p>
        <div class="text-xl w-full text-teal-darker flex flex-wrap py-4 justify-around" v-if="editing">
            <span class="block w-full">Address: </span>
            <textarea rows="8" v-model="user.address" class="border rounded shadow p-1 text-left w-full">
            </textarea>
        </div>
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
                user: this.dataUser
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
        }
    }
</script>
