<template>
    <div class="flex static w-full bg-transparent md:bg-tan-lightest items-start text-center mx-4 md:mx-2 flex-wrap rounded">
        <div class="w-full mx-12 px-12 py-0 md:px-0 md:w-2/5 lg:w-1/5 relative md:pin-l -mb-4 z-40 md:mb-1 md:block md:mx-0 md:py-12 lg:pt-16 md:mx-auto">
            <div class="px-12 lg:px-4"><avatar-upload :avatar-path="avatarPath" class="border border-tan-lightest" /></div>
            <p class="hidden md:block px-2 mt-2 text-xl text-smoke-dark" v-if="! boilerplate">{{ user.name }}</p>
            <p class="block px-2 mt-2 text-xl text-smoke-dark" v-else>Your Name</p>
            <p class="hidden md:block px-2 text-xs text-smoke-light">Beachy Beach Real Estate</p>
        </div>
        <div class="flex pb-4 pt-8 w-full md:w-3/5 bg-tan-lightest items-center justify-center pt-6 md:pt-6 md:mt-16 mx-auto px-1 md:pr-4 flex-wrap rounded shadow md:shadow-none"><!--leading-tighter is a custom utility. Compensates for <br>.-->
            <div class="w-1/3 items-start mx-auto p-1 mb-4">
                <p class="block text-5xl text-smoke-darker leading-tightest md:leading-tighter">
                    <span class="text-2xl md:text-5xl text-brand font-brand">{{ animatedClicks.toLocaleString() }}</span>
                    <br>
                    <span class="text-xs md:text-lg font-brand text-smoke">Property Clicks</span>
                </p>
            </div>
            <div class="w-1/3 items-start mx-auto p-1 mb-4">
                <p class="block text-5xl text-smoke-darker leading-tightest md:leading-tighter">
                    <span class="text-2xl md:text-5xl text-brand font-brand">{{ animatedImpressions.toLocaleString() }}</span>
                    <br>
                    <span class="text-xs md:text-lg font-brand text-smoke">Property Impressions</span>
                </p>
            </div>
            <div class="w-1/3 items-start mx-auto p-1 mb-4">
                <p class="block text-5xl text-smoke-darker leading-tightest md:leading-tighter">
                    <span class="text-2xl md:text-5xl text-brand font-brand">{{ animatedLeads }}</span>
                    <br>
                    <span class="text-xs md:text-lg font-brand text-smoke">Active Leads</span>
                </p>
            </div>
        </div>
        <button class="px-4 py-4 relative pin-b pin-r z-50 text-brand-darkest">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle fixed pin-b pin-r p-4"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12" y2="17"></line></svg>
        </button>

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
        },
        activeLeadsCount: {
            type: Number,
            default: 0
        }
    },
    data () {
        return {
            impressions: 0,
            animatedImpressions: 0,
            clicks: 0,
            animatedClicks: 0,
            leads: 0,
            animatedLeads: 0,
            properties: []
        }
    },
    computed: {
        user: function () {
            return this.dataUser;
        }
    },
    watch: {
        impressions: function (newValue, oldValue) {
            let vm = this;
            function animate () {
                if (window.TWEEN.update()) {
                    requestAnimationFrame(animate)
                }
            }
            new window.TWEEN.Tween({ tweeningNumber: oldValue })
                .easing(window.TWEEN.Easing.Quadratic.Out)
                .to({ tweeningNumber: newValue }, 1000)
                .onUpdate(function () {
                    vm.animatedImpressions = this._object.tweeningNumber.toFixed(0);
                })
                .onComplete(function () {
                    vm.animatedImpressions = vm.impressions.toLocaleString();
                })
                .start();

            animate()
        },
        clicks: function (newValue, oldValue) {
            let vm = this;
            function animate () {
                if (window.TWEEN.update()) {
                    requestAnimationFrame(animate)
                }
            }

            new window.TWEEN.Tween({ tweeningNumber: oldValue })
                .easing(window.TWEEN.Easing.Quadratic.Out)
                .to({ tweeningNumber: newValue }, 500)
                .onUpdate(function () {
                    vm.animatedClicks = this._object.tweeningNumber.toFixed(0);
                })
                .onComplete(function () {
                    vm.animatedClicks = vm.clicks.toLocaleString();
                })
                .start();

            animate()
        },
        leads: function (newValue, oldValue) {
            let vm = this;
            function animate () {
                if (window.TWEEN.update()) {
                    requestAnimationFrame(animate)
                }
            }

            new window.TWEEN.Tween({ tweeningNumber: oldValue })
                .easing(window.TWEEN.Easing.Quadratic.Out)
                .to({ tweeningNumber: newValue }, 750)
                .onUpdate(function () {
                    vm.animatedLeads = this._object.tweeningNumber.toFixed(0);
                })
                .onComplete(function () {
                    vm.animatedLeads = vm.leads.toLocaleString();
                })
                .start();

            animate()
        },
        activeLeadsCount: function (newValue) {
            this.leads = newValue;
        }
    },
    mounted () {
        this.getAnalytics();
    },
    methods: {
        getAnalytics () {
            window.axios.get('my-properties')
                .then(response => {
                    this.properties = response.data;
                    this.properties.map(property => {
                        this.impressions += property.impressions;
                        this.clicks += property.clicks;
                    }, self);
                });

            window.axios.get('leads/count')
                .then(response => {
                    this.leads = response.data;
                });
        }
    }
}
</script>
