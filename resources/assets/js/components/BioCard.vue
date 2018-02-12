<template>
    <div class="container mx-auto bg-white flex flex-wrap justify-center mb-8">
        <p class="w-full justify-between flex font-bold items-center text-secondary p-4 border-b border-secondary">
            <span class="text-left w-1/2 text-3xl font-brand font-bold text-secondary">
                BIO
            </span>
            <small class="text-xs w-1/2 text-right">Click on the text you want to edit</small>
        </p>
        <div class="w-full py-2 pl-2 bg-white flex flext-wrap items-center border-b">
            <div class="w-1/6 py-2 px-4 text-center">
                Name:
            </div>
            <input
                type="text"
                class="font-semibold border border-transparent text-xl py-2 bg-white w-1/2 text-left"
                :class="{
                    'border-secondary': name
                }"
                ref="name"
                v-model="user.name"
                @focus="edit('name')"
                @blur="submit('name')"
            >
        </div>
        <div class="w-full py-2 pl-2 bg-white flex flext-wrap items-center border-b">
            <div class="w-1/6 py-2 px-4 text-center">
                Email:
            </div>
            <input
                type="text"
                class="font-semibold border border-transparent text-xl py-2 bg-white w-1/2 text-left"
                :class="{
                    'border-secondary': email
                }"
                ref="email"
                v-model="user.email"
                @focus="edit('email')"
                @blur="submit('email')"
            >
        </div>
        <div class="w-full py-2 pl-2 bg-white flex flext-wrap items-center border-b">
            <div class="w-1/6 py-2 px-4 text-center">
                Phone:
            </div>
            <input
                type="text"
                class="font-semibold border border-transparent text-xl py-2 bg-white w-1/2 text-left"
                :class="{
                    'border-secondary': phone_number
                }"
                ref="phone_number"
                v-model="user.phone_number"
                @focus="edit('phone_number')"
                @blur="submit('phone_number')"
            >
        </div>
        <div class="w-full py-2 pl-2 bg-white flex flext-wrap items-center border-b">
            <div class="w-1/6 py-2 px-4 text-center">
                MLS IDs:
            </div>
            <input
                type="text"
                class="font-semibold border border-transparent text-xl py-2 bg-white w-1/2 text-left"
                :class="{
                    'border-secondary': mls_id
                }"
                ref="mls_id"
                v-model="user.mls_id"
                @focus="edit('mls_id')"
                @blur="submit('mls_id')"
            >
        </div>
        <div class="w-full py-2 pl-2 bg-white flex flext-wrap items-center border-b">
            <div class="w-1/6 py-2 px-4 text-center">
                Address:
            </div>
            <textarea
                class="font-semibold border border-transparent text-xl py-2 bg-white w-1/2 text-left"
                :class="{
                    'border-secondary': address
                }"
                ref="address"
                v-model="user.address"
                @focus="edit('address')"
                @blur="submit('address')"
            />
        </div>
    </div> </template>

<script>
export default {
    props: {
        dataUser: {
            type: Object,
            default: () => {}
        }
    },
    data() {
        return {
            name: false,
            email: false,
            phone_number: false,
            mls_id: false,
            address: false,
        }
    },
    computed: {
        user: function () {
            return this.dataUser;
        }
    },
    methods: {
        edit(key) {
            this[key] = true;
            this.$refs[key].select();
        },
        submit (key) {
            this[key] = false;
            this.$emit('submit-button-clicked', this.user);
        }
    }
}
</script>
