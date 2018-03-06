<template>
    <div>
        <div class="pb-1 pt-4 w-full flex items-center justify-center flex-wrap"><!--leading-tighter is a custom utility. Compensates for <br>.-->
            <div class="w-full text-grey-darker md:pt-2">
                <h3 class="font-brand text-xl">Property Analytics</h3>
            </div>
            <div class="w-1/3 items-start mx-auto p-1 mb-2 md:mb-4">
                <p class="block text-5xl text-smoke-darker leading-tightest md:leading-tighter">
                    <p class="text-3xl md:text-5xl text-brand font-brand">{{ animatedClicks.toLocaleString() }}</p>
                    <p class="text-sm md:text-lg font-brand text-smoke leading-tight">Total <span class="md:hidden clearfix"></span>Clicks</p>
                </p>
            </div>
            <div class="w-1/3 items-start mx-auto p-1 mb-2 md:mb-4">
                <p class="block text-5xl text-smoke-darker leading-tightest md:leading-tighter">
                    <p class="text-3xl md:text-5xl text-brand font-brand">{{ animatedImpressions.toLocaleString() }}</p>
                <p class="text-sm md:text-lg font-brand text-smoke leading-tight">Total <span class="md:hidden clearfix"></span>Impressions</p>
                </p>
            </div>
            <div class="w-1/3 items-start mx-auto p-1 mb-2 md:mb-4">
                <p class="block text-5xl text-smoke-darker leading-tightest md:leading-tighter">
                    <p class="text-3xl md:text-5xl text-brand font-brand">{{ clickThruRate.toLocaleString() }}</p>
                    <p class="text-sm md:text-lg font-brand text-smoke leading-tight">Average <span class="md:hidden clearfix"></span>Click-thru Rate</p>
                </p>
            </div>
            <div class="w-full text-grey-darker pt-2 md:pt-6 border-grey-light border-t">
                <h3 class="font-brand text-xl">Lead Analytics</h3>
            </div>
            <div class="w-1/3 items-start mx-auto p-1 md:mb-4">
                <p class="block text-5xl text-smoke-darker leading-tightest md:leading-tighter">
                    <p class="text-3xl md:text-5xl text-brand font-brand">{{ animatedLeads }}</p>
                    <p class="text-sm md:text-lg font-brand text-smoke leading-tight">Active</p>
                </p>
            </div>
            <div class="w-1/3 items-start mx-auto p-1 md:mb-4">
                <p class="block text-5xl text-smoke-darker leading-tightest md:leading-tighter">
                    <p class="text-3xl md:text-5xl text-brand font-brand">{{ animatedArchivedLeads }}</p>
                    <p class="text-sm md:text-lg font-brand text-smoke leading-tight">Archived</p>
                </p>
            </div>
            <div class="w-1/3 items-start mx-auto p-1 md:mb-4">
                <p class="block text-5xl text-smoke-darker leading-tightest md:leading-tighter">
                    <p class="text-3xl md:text-5xl text-brand font-brand">{{ totalLeads }}</p>
                    <p class="text-sm md:text-lg font-brand text-smoke leading-tight">Total</p>
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
        boilerplate: {
            type: Boolean,
            default: false
        },
        activeLeadsCount: {
            type: Number,
            default: 0
        },
        archivedLeadsCount: {
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
            properties: [],
            archivedLeads: 0,
            animatedArchivedLeads: 0
        }
    },
    computed: {
        user: function () {
            return this.dataUser;
        },
        totalLeads: function () {
            return this.leads + this.archivedLeads;
        },
        clickThruRate: function () {
            return ((this.clicks/this.impressions) * 100).toFixed(2) + '%';
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
