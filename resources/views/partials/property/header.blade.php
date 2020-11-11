<section
    class="flex hero lg:h-48 bg-brand-darker py-4 pt-32 bg-image-full"
    style="background-image: url('{{ $headerPhoto }}')"
>
    <div class="container mx-auto text-center md:text-left">
        <h1 class="text-white text-center md:text-left text-shadow" tabindex="0">
            {{ $property->street_number }} {{ $property->street_name }} {{ $property->street_suffix }}
            <span class="block md:inline-block text-sm"> MLS# {{ $property->mls_account }}</span>
        </h1>
    </div>
</section>