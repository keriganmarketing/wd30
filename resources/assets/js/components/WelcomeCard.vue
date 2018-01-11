<template>
    <div class="w-2/3 bg-white text-2xl text-center border ml-2 shadow flex flex-wrap items-center justify-center">
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