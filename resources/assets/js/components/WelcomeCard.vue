<template>
<div class="w-full">
    <div class="flex w-full relative text-center">
        <div class="w-1/5 mt-3"><!--Avatar box and info-->
            <avatar-upload :avatar-path="avatarPath"></avatar-upload>
            <p class="block px-2 mt-2 text-xl text-smoke-dark">{{ firstName }} Branham</p><!--pull in fullname-->
            <p class="block px-2 text-xs text-smoke-light">
            <a href="https://beachybeach.com/" class="no-underline">
                Beachy Beach Real Estate
            </a>
            </p>
        </div>
        <div class="flex w-full items-center justify-around pl-6 pb-16 mt-4 mx-auto">
            <div class="w-1/3 items-center justify-center mx-auto">
                <p class="block text-smoke-darker">
                    <span class="text-5xl">343</span>
                    <br>
                    <span class="text-lg font-hairline">Property Clicks</span>
                </p>
            </div>
            <div class="w-1/3 items-center justify-center mx-auto">
                <p class="block text-smoke-darker">
                    <span class="text-5xl">4,326</span>
                    <br>
                    <span class="text-lg font-hairline">Property Impressions</span>
                </p>
            </div>
            <div class="w-1/3 items-center justify-center mx-auto">
                <p class=" block text-smoke-darker">
                    <span class="text-5xl">12</span>
                    <br>
                    <span class="text-lg font-hairline">Active Leads</span>
                </p>
            </div>
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
