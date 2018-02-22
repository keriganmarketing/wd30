<template>
    <form class="pt-6 pb-8 align-top flex flex-wrap" @submit.prevent>
        <div class="w-full px-2 py-2">
            <transition name="success" mode="out-in">
                <div
                    class="flex-auto relative items-center text-secondary text-2xl bg-green-lighter rounded py-8 px-3 w-full"
                    v-if="form.success"
                    v-text="form.successMessage"
                />
            </transition>
            <transition name="slide-fade" mode="out-in">
                <div
                    class="flex-auto relative items-center text-red-darker text-2xl bg-red-lighter rounded py-8 px-3 w-full"
                    v-if="Object.keys(form.errors).length > 0"
                >
                    <ul v-for="error in form.errors" class="list-reset">
                        <li v-for="e in error" class="w-full text-left px-4 py-2">{{ e }}</li>
                    </ul>
                </div>
            </transition>
        </div>
        <div class="flex-auto relative px-2 py-2 w-full md:w-1/2">
            <input type="hidden" name="_token" :value="token">
            <input type="hidden" name="listing" :value="listing">
            <input class="block shadow appearance-none w-full border rounded text-grey-darker hover:border-grey h-10 py-2 px-3 mb-4" type="text" v-model="form.name" placeholder="Name" >
            <input class="block shadow appearance-none w-full border rounded text-grey-darker hover:border-grey h-10 py-2 px-3 mb-4" type="text" v-model="form.email" placeholder="Email Address" >
            <input class="block shadow appearance-none w-full border rounded text-grey-darker hover:border-grey h-10 py-2 px-3" type="text" v-model="form.phone" placeholder="Phone Number" >
        </div>
        <div class="flex-auto relative px-2 py-2 w-full md:w-1/2">
            <textarea class="block shadow appearance-none w-full border rounded text-grey-darker hover:border-gray h-24 py-2 px-3 mb-4" v-model="form.message" ></textarea>
            <button class="button-secondary w-full h-10" @click.prevent="submit">Submit</button>
        </div>
    </form>
</template>
<script>
import ContactForm from '../models/contact-form';
export default {
    props: {
        token: {
            type: String,
            default: this.token
        },
        listing: {
            type: String,
            default: ''
        }
    },
    data() {
        return {
            form: new ContactForm({
                name: '',
                email: '',
                listing: '',
                phone: '',
                message: '',
                errors: {},
                success: false,
                successMessage: 'Thanks! We\'ll get back with you as soon as possible!',
            }),
        }
    },
    methods: {
        submit () {
            this.form.submit();
        }
    }
}
</script>
<style>
.slide-fade-enter-active {
    transition: all .3s ease;
}
.slide-fade-leave-active {
    transition: all .1s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to {
    opacity: 0;
}
.slide-fade-enter {
    position: absolute;
    transform: translateX(-999px);
}
.slide-fade-leave-to {
    transform: translateX(999px);
}
.success-enter-active {
    transition: all .3s ease;
}
.success-leave-active {
    transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.success-enter, .success-leave-to {
    transform: translateX(-999px);
    opacity: 0;
}
</style>

