<section id="contact" class="contact flex bg-primary py-8 lg:py-16 xl:py-24">
    <div class="w-full lg:max-w-lg mx-auto py-2 text-center">
        <h2 class="text-white text-center pb-4 text-3xl">Contact</h2>
        <p><a class="no-underline text-2xl text-white text-bold" href="tel:{{ $realtor->data->primary_phone }}" >{{ $realtor->data->primary_phone }}</a></p>
        <p class="text-lg text-white mt-4">{!! nl2br($realtor->data->address) !!}</p>
        <p class="text-lg text-white mt-4"><a class="text-white" href="mailto:{{ $realtor->data->email }}" >{{ $realtor->data->email }}</a></p>
        <contact-form
            token="{{ csrf_token() }}"
            @if (isset($property))
                listing="{{ $property->mls_account }}"
                listing-address="{{ $address }}"
                listing-latitude="{{ $property->latitude }}"
                listing-longitude="{{ $property->longitude }}"
                agent="{{ $property->agent->first_name }} {{ $property->agent->last_name }}"
                agent-email="{{ $property->agent->email }}"
                agent-phone="{{ $property->agent->primary_phone }}"
            @endif
            >
            </contact-form>
        <div class="social-agent mt-2 px-4 text-center">
            @if ($realtor->data->fb_page_id)
                <a class="facebook" href="https://www.facebook.com/{{ $realtor->data->fb_page_id }}" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.02 34.02" class="h-12" style="enable-background:new 0 0 50 50; width: 50px;" xml:space="preserve">
                        <path fill="#43609C" d="M17,34A17,17,0,1,0,0,17,17,17,0,0,0,17,34"></path>
                        <path fill="#FFF" d="M12.9,14.13h1.76V12.42a4.57,4.57,0,0,1,.57-2.64A3.13,3.13,0,0,1,18,8.5a11.05,11.05,0,0,1,3.15.32l-.44,2.6a5.94,5.94,0,0,0-1.42-.21c-.68,0-1.3.25-1.3.93v2h2.8l-.2,2.54H18v8.84h-3.3V16.67H12.9Z"></path>
                    </svg>
                </a>
            @endif
            @if ($realtor->data->twitter_handle)
            <a class="twitter" href="https://twitter.com/{{ $realtor->data->twitter_handle }}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.02 34.02" class="h-12" style="enable-background:new 0 0 50 50; width: 50px;" xml:space="preserve">
                    <path fill="#79ccf0" class="container" d="M17,34A17,17,0,1,0,0,17,17,17,0,0,0,17,34"></path>
                    <path fill="#FFF" d="M25.54,12.55a7,7,0,0,1-2,.55,3.5,3.5,0,0,0,1.54-1.93,7,7,0,0,1-2.22.85,3.5,3.5,0,0,0-6,3.19,9.92,9.92,0,0,1-7.2-3.65,3.5,3.5,0,0,0,1.08,4.67,3.5,3.5,0,0,1-1.58-.44v0A3.5,3.5,0,0,0,12,19.25a3.41,3.41,0,0,1-.92.12,3.46,3.46,0,0,1-.66-.06,3.5,3.5,0,0,0,3.26,2.43A7.07,7.07,0,0,1,8.5,23.19a9.94,9.94,0,0,0,15.3-8.37c0-.15,0-.3,0-.45a7.09,7.09,0,0,0,1.74-1.81"></path>
                </svg>
            </a>
            @endif
            @if ($realtor->data->instagram_handle)
            <a class="instagram" href="https://instagram.com/{{ $realtor->data->instagram_handle }}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.02 34.02" class="h-12" style="enable-background:new 0 0 50 50; width: 50px;" xml:space="preserve">
                    <path fill="#E3415C" d="M17,34A17,17,0,1,0,0,17,17,17,0,0,0,17,34"></path>
                    <path fill="#FFF" d="M22.23,8.5H11.79a3.29,3.29,0,0,0-3.29,3.29V22.23a3.29,3.29,0,0,0,3.29,3.29H22.23a3.29,3.29,0,0,0,3.29-3.29V11.79A3.29,3.29,0,0,0,22.23,8.5Zm.94,2h.38v2.88H20.67V10.47Zm-8.59,4.8A3,3,0,1,1,14,17,3,3,0,0,1,14.58,15.26Zm9.27,7a1.63,1.63,0,0,1-1.63,1.63H11.79a1.63,1.63,0,0,1-1.63-1.63v-7H12.7a4.65,4.65,0,1,0,8.62,0h2.54Z"></path>
                </svg>
            </a>
            @endif
            @if ($realtor->data->youtube_channel_id)
            <a class="youtube" href="https://www.youtube.com/channel/{{ $realtor->data->youtube_channel_id }}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.02 34.02" class="h-12" style="enable-background:new 0 0 50 50; width: 50px;" xml:space="preserve">
                    <path fill="#e9644b" class="container" d="M17,34A17,17,0,1,0,0,17,17,17,0,0,0,17,34"></path>
                    <path fill="#FFF" d="M20.31,17l-5.57,3.27V13.75Zm5.2,3V14A2.87,2.87,0,0,0,22.58,11H11.43A2.87,2.87,0,0,0,8.5,14V20A2.87,2.87,0,0,0,11.43,23H22.58A2.87,2.87,0,0,0,25.51,20"></path>
                </svg>
            </a>
            @endif
        </div>
    </div>
</section>