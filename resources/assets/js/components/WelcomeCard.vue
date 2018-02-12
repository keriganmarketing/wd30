<template>
    <div class="flex w-full text-center mb-4 flex-wrap">
        <div class="w-full md:w-1/5"><!--Avatar box and info-->
            <avatar-upload :avatar-path="avatarPath" />
            <p class="block px-2 mt-2 text-xl text-smoke-dark" v-if="! boilerplate">{{ user.name }}</p>
            <p class="block px-2 mt-2 text-xl text-smoke-dark" v-else>Your Name</p>
            <p class="block px-2 text-xs text-smoke-light">Beachy Beach Real Estate</p>
        </div>
        <div class="flex w-full md:w-4/5 items-center justify-around leading-tighter mx-auto pt-6 md:pt-0 flex-wrap"><!--leading-tighter is a custom utility. Compensates for <br>.-->
            <div class="w-full sm:w-1/3 items-center justify-center mx-auto py-2">
                <p class="block text-5xl text-smoke-darker">
                    <span class="text-5xl text-brand font-brand">343</span>
                    <br>
                    <span class="text-lg font-hairline">Property Clicks</span>
                </p>
            </div>
            <div class="w-full sm:w-1/3 items-center justify-center mx-auto py-2">
                <p class="block text-5xl text-smoke-darker">
                    <span class="text-5xl text-brand font-brand">4,326</span>
                    <br>
                    <span class="text-lg font-hairline">Property Impressions</span>
                </p>
            </div>
            <div class="w-full sm:w-1/3 items-center justify-center mx-auto py-2">
                <p class=" block text-5xl text-smoke-darker">
                    <span class="text-5xl text-brand font-brand">12</span>
                    <br>
                    <span class="text-lg font-hairline">Active Leads</span>
                </p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        dataUser: {
            type: Object,
            default: () => {}
        },
        avatarPath: {
            type: String,
            default: ''
        },
        boilerplate: {
            type: Boolean,
            default: false
        }
    },
    computed: {
        user: function () {
            return this.dataUser;
        }
    }
}
</script>
