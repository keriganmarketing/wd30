<template>
    <div class="w-full bg-white text-xl text-center border shadow flex flex-wrap items-center justify-center min-h-full p-8">
        <p class="block w-full">Welcome back, {{ firstName }}!</p>
        <p class="block w-full">*Lead Info, analytics, and notifications go here*</p>
    </div>
</template>
<script>
export default {
    props: ['dataUser'],
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