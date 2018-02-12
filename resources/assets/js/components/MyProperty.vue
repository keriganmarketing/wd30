<template>
    <div class="w-full md:w-1/2 lg:w-1/3 px-2 py-2" >
        <div class="w-full flex bg-white py-2 text-brand">
            <p class="flex flex-wrap items-start text-center justify-center py-2 w-1/3 border-r">
                {{ listing.clicks.toLocaleString() }}
                <br>
                Clicks
            </p>
            <p class="flex flex-wrap items-center text-center justify-center py-2 w-1/3 border-r">
                {{ listing.impressions.toLocaleString() }}
                <br>
                Impressions
            </p>
            <p class="flex flex-wrap items-center text-center justify-center py-2 w-1/3 border-r">
                {{ ctr }}%
                <br>
                CTR
            </p>
        </div>
        <div
            class="property relative bg-white shadow-md md:rounded overflow-hidden border-b-4 border-brand hover:border-secondary"
        >
            <a
                :href="'/listing/' + listing.mls_account"
                class="absolute pin hover:shadow-inner z-50"
            />
            <div class="property-image md:h-48 md:overflow-hidden">
                <div
                    class="inline-block absolute flag pin-t pin-l w-auto bg-secondary text-white p-1 px-4 mt-2 z-10 font-brand text-xl"
                    v-if="listing.has_open_houses"
                >
                    OPEN HOUSE
                </div>
                <div
                    class="inline-block absolute flag pin-t pin-l w-auto bg-secondary text-white p-1 px-4 mt-2 z-10 font-brand text-xl"
                    v-if="listing.status !== 'Active'"
                >
                    {{ listing.status }}
                </div>
                <img class="w-auto h-auto min-h-full min-w-full" :src="listing.preferred_image" >
            </div>
            <div class="property-details py-2 px-2">
                <div class="address h-12 flex flex-col justify-center align-middle">
                    <p class="p-2 text-grey-darker text-sm text-center">
                        {{ listing.street_number }} {{ listing.street_name }}
                        <span v-if="listing.unit_number != ''">
                            Unit {{ listing.unit_number }}
                        </span>
                        <br>
                        {{ listing.city }}, {{ listing.state }}
                    </p>
                </div>
                <div class="price">
                    <p class="py-2 text-center text-brand text-3xl font-brand">${{ listing.price.toLocaleString() }}</p>
                </div>
                <div class="prop-type">
                    <p class="pb-2 text-grey-darkest text-center text-xs text-grey-dark text-uppercase">{{ listing.property_type }}</p>
                </div>
                <div class="mls text-center mt-3">
                    <p class="text-grey-dark text-xs">MLS# {{ listing.mls_account }}</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        listing: {
            type: Object,
            default: () => {}
        }
    },
    computed: {
        ctr: function () {
            let ratio = (this.listing.clicks / this.listing.impressions) * 100;
            return ratio.toFixed(2);
        }
    }
}
</script>
