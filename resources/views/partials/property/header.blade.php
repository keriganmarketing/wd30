<section
    class="flex hero lg:h-16 bg-brand-darker py-4 bg-image-full"
    style="background-image: url('https://www.xtns.org/wp-content/uploads/2014/06/beach-resort-glamorous-panama-city-beach-chateau-resort-panama-city-beach-resorts-beachfront-panama-city-beach-resorts-and-condos-panama-city-beach-resorts-with-tiki-bar-panama-city-beach-southern.jpg')"
>
    <div class="container mx-auto text-center md:text-left">
        <h1 class="text-white text-center md:text-left">
            {{ $property->street_number }} {{ $property->street_name }}
            <span class="block md:inline-block text-sm"> MLS# {{ $property->mls_account }}</span>
        </h1>
    </div>
</section>