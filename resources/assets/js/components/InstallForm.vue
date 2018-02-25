<template>
    <div class="container mx-auto bg-white rounded flex flex-wrap justify-center border shadow">
        <p class="w-full justify-center flex font-bold items-center text-secondary pt-4">
            <div
                class="text-center px-4"
                v-if="! building"
            >
                <p class="text-4xl font-brand text-brand">Welcome to your new agent website!</p>
                <p class="text-grey-darker">We just need a couple of things to get started.</p>
            </div>
            <div
                class="text-center px-4"
                v-if="duplicatesFound"
            >
                <p class="text-4xl font-brand text-brand">Awesome!</p>
                <p class="text-grey-darker">We noticed some duplicate information in your MLS data, select the most accurate choice for each field below. If you're not sure, you can always change this later.</p>
            </div>
            <div
                class="text-center px-4"
                v-if="! duplicatesFound && building"
            >
                <p class="text-4xl font-brand text-brand">All set!</p>
                <p class="text-grey-darker">Easy, huh? Click the button below to login to your site. Happy Selling!</p>
            </div>
        </p>
        <div v-if="! building" class="w-full">
            <form @submit.prevent >
                <div class="w-full py-4 bg-white flex flex-wrap items-center justify-center pt-6">
                    <div class="font-bold w-full sm:w-1/4 py-2 text-center sm:text-right text-green-darker">
                        Your Name:
                    </div>
                    <input
                        type="text"
                        class="border border-brand sm:ml-4 md:text-xl py-2 md:px-2 bg-white w-4/5 sm:w-1/2 text-left"
                        v-model="name"
                        autocomplete="name"
                        name="name"
                    >
                </div>
                <div class="w-full py-4 bg-white flex flex-wrap items-center justify-center ">
                    <div class="font-bold w-full sm:w-1/4 py-2 text-center sm:text-right text-green-darker">
                        Your Email:
                    </div>
                    <input
                        type="text"
                        class="border border-brand sm:ml-4 md:text-xl py-2 md:px-2 bg-white w-4/5 sm:w-1/2 text-left text-center sm:text-left"
                        v-model="email"
                        autocomplete="email"
                        name="email"
                    >
                </div>
                <div class="w-full py-4 bg-white flex flex-wrap items-center justify-center ">
                    <div class="font-bold w-full sm:w-1/4 py-2 text-center sm:text-right text-green-darker">
                        Broker:
                    </div>
                    <input
                        type="text"
                        class="border border-brand sm:ml-4 md:text-xl py-2 md:px-2 bg-white w-4/5 sm:w-1/2 text-left text-center sm:text-left"
                        v-model="company"
                        autocomplete="company"
                        name="company"
                    >
                </div>
                <div class="w-full py-4 bg-white flex flex-wrap items-center justify-center ">
                    <div class="font-bold w-full sm:w-1/4 py-2 text-center sm:text-right text-green-darker">
                        Create Password:
                    </div>
                    <input
                        type="password"
                        class="border border-brand sm:ml-4 md:text-xl py-2 md:px-2 bg-white w-4/5 sm:w-1/2 text-left text-center sm:text-left"
                        v-model="password"
                        autocomplete="password"
                        name="password"
                    >
                </div>
                <div class="w-full py-4 bg-white flex flex-wrap items-center justify-center ">
                    <div class="font-bold w-full sm:w-1/4 py-2 text-center sm:text-right text-green-darker">
                        Confirm Password:
                    </div>
                    <input
                        type="password"
                        class="border border-brand sm:ml-4 md:text-xl py-2 md:px-2 bg-white w-4/5 sm:w-1/2 text-left text-center sm:text-left"
                        v-model="password_confirmation"
                        autocomplete="password_confirmation"
                        name="password_confirmation"
                    >
                </div>
                <div class="w-full bg-white flex flex-wrap items-center p-4">
                    <button
                        class="button-secondary .px-3 .py-2 w-full h-16 text-2xl font-brand"
                        @click="install"
                    >
                        BUILD MY SITE
                    </button>
                </div>
            </form>
        </div>
        <div
            class="w-full py-4 bg-white flex flex-wrap items-center justify-center border-b"
            v-if="duplicatesFound"
        >
            <div class="w-full py-4 bg-white flex flex-wrap items-center justify-between">
                <div
                    class="font-bold w-full text-center py-4"
                    v-if="chooseOfficePhone"
                >
                    Office Phone:
                </div>
                <div
                    class="w-full flex flex-wrap items-center justify-center py-4"
                    v-if="chooseOfficePhone"
                >
                    <button
                        class="bg-grey text-white appearance-none inline-block border-4 border-white rounded p-3 w-full sm:w-1/3 hover:bg-grey-darker"
                        v-for="op in office_phone"
                        @click="select('office_phone', op)"
                    >
                        {{ op }}
                    </button>
                </div>
                <div
                    class="font-bold w-full text-center py-4"
                    v-if="chooseCellPhone"
                >
                    Cell Phone:
                </div>
                <div
                    class="w-full flex flex-wrap items-center justify-center py-4"
                    v-if="chooseCellPhone"
                >
                    <button
                        class="bg-grey text-white appearance-none inline-block border-4 border-white rounded p-3 w-full sm:w-1/3 hover:bg-grey-darker"
                        v-for="cp in cell_phone"
                        @click="select('cell_phone', cp)"
                    >
                        {{ cp }}
                    </button>
                </div>
                <div
                    class="font-bold w-full text-center py-4"
                    v-if="chooseStreet1"
                >
                    Street 1:
                </div>
                <div
                    class="w-full flex flex-wrap items-center justify-center py-4"
                    v-if="chooseStreet1"
                >
                    <button
                        class="bg-grey text-white appearance-none inline-block border-4 border-white rounded p-3 w-full sm:w-1/3 hover:bg-grey-darker"
                        v-for="s1 in street_1"
                        @click="select('street_1', s1)"
                    >
                        {{ s1 }}
                    </button>
                </div>
                <div
                    class="font-bold w-full text-center py-4"
                    v-if="chooseStreet2"
                >
                    Street 2:
                </div>
                <div
                    class="w-full flex flex-wrap items-center justify-center py-4"
                    v-if="chooseStreet2"
                >
                    <button
                        class="bg-grey text-white appearance-none inline-block border-4 border-white rounded p-3 w-full sm:w-1/3 hover:bg-grey-darker"
                        v-for="s2 in street_2"
                        @click="select('street_2', s2)"
                    >
                        {{ s2 }}
                    </button>
                </div>
                <div
                    class="font-bold w-full text-center py-4"
                    v-if="chooseCity"
                >
                    City:
                </div>
                <div
                    class="w-full flex flex-wrap items-center justify-center py-4"
                    v-if="chooseCity"
                >
                    <button
                        class="bg-grey text-white appearance-none inline-block border-4 border-white rounded p-3 w-full sm:w-1/3 hover:bg-grey-darker"
                        v-for="c in city"
                        @click="select('city', c)"
                    >
                        {{ c }}
                    </button>
                </div>
                <div
                    class="font-bold w-full text-center py-4"
                    v-if="chooseState"
                >
                    State:
                </div>
                <div
                    class="w-full flex flex-wrap items-center justify-center py-4"
                    v-if="chooseState"
                >
                    <button
                        class="bg-grey text-white appearance-none inline-block border-4 border-white rounded p-3 w-full sm:w-1/3 hover:bg-grey-darker"
                        v-for="st in state"
                        @click="select('state', st)"
                    >
                        {{ st }}
                    </button>
                </div>
                <div
                    class="font-bold w-full text-center py-4"
                    v-if="chooseZip"
                >
                    Zip:
                </div>
                <div
                    class="w-full flex flex-wrap items-center justify-center py-4"
                    v-if="chooseZip"
                >
                    <button
                        class="bg-grey text-white appearance-none inline-block border-4 border-white rounded p-3 w-full sm:w-1/3 hover:bg-grey-darker"
                        v-for="z in zip"
                        @click="select('zip', z)"
                    >
                        {{ z }}
                    </button>
                </div>
            </div>
        </div>
        <div
            class="w-full p-4 bg-white flex flex-wrap items-center justify-between"
            v-if="! duplicatesFound && building"
        >
            <button
                class="button-secondary .px-3 .py-2 w-full h-16 text-2xl font-brand"
                @click="finishInstall"
            >
                GO!
            </button>
        </div>
    </div>
</template>
<script>
export default {
    data () {
        return {
            name: '',
            email: '',
            company: '',
            mls_id: [],
            cell_phone: [],
            office_phone: [],
            street_1: [],
            street_2: [],
            city: [],
            state: [],
            zip: [],
            photos: [],
            building: false,
            password: '',
            password_confirmation: ''
        }
    },
    computed: {
        duplicatesFound: function () {
            return (
                this.chooseOfficePhone ||
                this.chooseCellPhone   ||
                this.chooseStreet1     ||
                this.chooseStreet2     ||
                this.chooseCity        ||
                this.chooseState       ||
                this.chooseZip
            );
        },
        chooseOfficePhone: function () {
            return (this.office_phone.length > 1)
        },
        chooseCellPhone: function () {
            return (this.cell_phone.length > 1)
        },
        chooseStreet1: function () {
            return (this.street_1.length > 1);
        },
        chooseStreet2: function () {
            return (this.street_2.length > 1);
        },
        chooseCity: function () {
            return (this.city.length > 1);
        },
        chooseState: function () {
            return (this.state.length > 1);
        },
        chooseZip: function () {
            return (this.zip.length > 1);
        }
    },
    methods: {
        install () {
            this.building = true;
            window.axios.post('/configure-install', {
                name: this.name,
                email: this.email,
                company: this.company,
                password: this.password,
                password_confirmation: this.password_confirmation
            })
                .then(response => {
                    let data = response.data;
                    this.zip          = data.zip;
                    this.city         = data.city;
                    this.state        = data.state;
                    this.photos       = data.photos;
                    this.mls_id       = data.mls_id;
                    this.street_1     = data.street_1;
                    this.street_2     = data.street_2;
                    this.cell_phone   = data.cell_phone;
                    this.office_phone = data.office_phone;
                });
        },
        select (key, value) {
            this[key] = [value];
        },
        finishInstall () {
            window.axios.post('/finish-install', {
                mls_id: this.mls_id,
                cell_phone: this.cell_phone[0],
                office_phone: this.office_phone[0],
                street_1: this.street_1[0],
                street_2: this.street_2[0],
                city: this.city[0],
                state: this.state[0],
                zip: this.zip[0],
                photo: this.photos[0]
            })
                .then(response => {
                    window.location = '/login';
                });
        }
    }
}
</script>
