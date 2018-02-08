<template>
<div class="flex w-full text-center mb-4">
    <div class="w-1/5"><!--Avatar box and info-->
        <avatar-upload :avatar-path="avatarPath"></avatar-upload>
        <p class="block px-2 mt-2 text-xl text-smoke-dark">{{ firstName }} Branham</p><!--pull in fullname-->
        <p class="block px-2 text-xs text-smoke-light">Beachy Beach Real Estate</p>
    </div>
    <div class="flex w-full items-center justify-around leading-tighter mx-auto"><!--leading-tighter is a custom utility. Compensates for <br>.-->
        <div class="w-1/3 items-center justify-center mx-auto">
            <p class="block text-5xl text-smoke-darker">
                <span class="text-4xl">343</span>
                <br>
                <span class="text-lg font-hairline">Property Clicks</span>
            </p>
        </div>
        <div class="w-1/3 items-center justify-center mx-auto">
            <p class="block text-5xl text-smoke-darker">
                <span class="text-4xl">4,326</span>
                <br>
                <span class="text-lg font-hairline">Property Impressions</span>
            </p>
        </div>
        <div class="w-1/3 items-center justify-center mx-auto">
            <p class=" block text-5xl text-smoke-darker">
                <span class="text-4xl">12</span>
                <br>
                <span class="text-lg font-hairline">Active Leads</span>
            </p>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props: ['dataUser','avatarPath'],
    computed: {
        user: function () {
            return this.dataUser;
        },
        firstName: function () {
            let name = this.user.name.split(" ");
            return name[0];
        }
    }
}
</script>