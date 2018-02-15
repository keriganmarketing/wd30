<section
    class="flex hero lg:h-16 bg-brand-darker py-4 bg-image-full"
    style="background-image: url('https://beachybeach.com/wp-content/themes/kmaidx/img/beachy-illustration.jpg')"
>
    <div class="container mx-auto text-center md:text-left">
        <h1 class="text-white text-center md:text-left text-shadow">
            {{ $property->street_number }} {{ $property->street_name }}
            <span class="block md:inline-block text-sm"> MLS# {{ $property->mls_account }}</span>
        </h1>
    </div>
</section>