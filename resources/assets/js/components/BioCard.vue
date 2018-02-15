<template>
    <div class="container mx-auto bg-white flex flex-wrap justify-center mb-8">
        <p class="w-full justify-between flex font-bold items-center text-secondary p-4 border-b border-secondary">
            <span class="text-left w-auto text-3xl font-brand font-bold text-secondary">
                BIO
            </span>
            <small class="text-xs w-auto flex-grow text-right">Click on the text you want to edit</small>
        </p>
        <div class="w-full py-2 bg-white flex flex-wrap items-center border-b">
            <div class="font-bold w-1/3 sm:w-1/4 md:w-1/6 py-2 px-4 text-left">
                Name:
            </div>
            <input
                type="text"
                class="border border-transparent md:text-xl py-2 md:px-2 bg-white w-auto flex-grow text-left"
                :class="{
                    'border-secondary': name
                }"
                ref="name"
                v-model="user.name"
                @focus="edit('name')"
                @blur="submit('name')"
            >
        </div>
        <div class="w-full py-2 bg-white flex flex-wrap items-center border-b">
            <div class="font-bold w-1/3 sm:w-1/4 md:w-1/6 py-2 px-4 text-left">
                Email:
            </div>
            <input
                type="text"
                class="border border-transparent md:text-xl py-2 md:px-2 bg-white w-auto flex-grow text-left"
                :class="{
                    'border-secondary': email
                }"
                ref="email"
                v-model="user.email"
                @focus="edit('email')"
                @blur="submit('email')"
            >
        </div>
        <div class="w-full py-2 bg-white flex flex-wrap items-center border-b">
            <div class="font-bold w-1/3 sm:w-1/4 md:w-1/6 py-2 px-4 text-left">
                Phone:
            </div>
            <input
                type="text"
                class="border border-transparent md:text-xl py-2 md:px-2 bg-white w-auto flex-grow text-left"
                :class="{
                    'border-secondary': phone_number
                }"
                ref="phone_number"
                v-model="user.phone_number"
                @focus="edit('phone_number')"
                @blur="submit('phone_number')"
            >
        </div>
        <div class="w-full py-2 bg-white flex flex-wrap items-center border-b">
            <div class="font-bold w-1/3 sm:w-1/4 md:w-1/6 py-2 px-4 text-left">
                MLS&nbsp;IDs:
            </div>
            <input
                type="text"
                class="border border-transparent md:text-xl py-2 md:px-2 bg-white w-auto flex-grow text-left"
                :class="{
                    'border-secondary': mls_id
                }"
                ref="mls_id"
                v-model="user.mls_id"
                @focus="edit('mls_id')"
                @blur="submit('mls_id')"
            >
        </div>
        <div class="w-full py-2 bg-white flex flex-wrap items-start border-b">
            <div class="font-bold w-full sm:w-1/4 md:w-1/6 py-2 px-4 text-left">
                Address:
            </div>
            <textarea
                class="border border-transparent md:text-xl py-2 px-4 md:px-2 bg-white w-full md:w-auto flex-grow text-left"
                :class="{
                    'border-secondary': address
                }"
                ref="address"
                v-model="user.address"
                @focus="edit('address')"
                @blur="submit('address')"
                rows="4"
            />
        </div>
    </div>
</template>

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
