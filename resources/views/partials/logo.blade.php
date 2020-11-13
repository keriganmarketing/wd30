<a href="{{ url('/') }}" class="no-underline text-left font-brand inline-flex justify-start items-center leading-none pt-1">
    <span class="realtor-name py-2 mx-1 md:m-0 text-2xl md:text-3xl">
        <span v-if="! boilerplate" class="logo-text-primary font-brand text-2xl md:text-4xl">@{{ user.name }}</span>
        <span v-else class="logo-text-primary font-brand text-2xl md:text-4xl">Your Name</span>
        <span class="text-grey-dark block text-xs md:text-sm pb-2">@{{ user.company }}</span>
    </span>
</a>