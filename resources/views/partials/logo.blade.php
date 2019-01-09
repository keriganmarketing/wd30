<a href="{{ url('/') }}" class="no-underline text-left font-brand inline-flex justify-start items-center leading-none pt-1">
    <span class="realtor-name text-logoprimary font-brand py-2 mx-1 md:m-0 text-2xl md:text-3xl">
        <span v-if="! boilerplate" class="font-brand">@{{ user.name }}</span>
        <span v-else class="font-brand text-2xl md:text-4xl">Your Name</span>
        <span class="block text-xs md:text-sm text-logosecondary pb-2">@{{ user.company }}</span>
    </span>
</a>