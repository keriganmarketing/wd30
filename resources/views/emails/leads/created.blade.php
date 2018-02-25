@component('mail::message')
# Thanks for contacting me!

{{ $lead->name }},
Thank you so much for considering me to help you with your real estate needs. I look forward to speaking with you soon!

The information you submitted is listed below:
Name: {{ $lead->name }}
Email: {{ $lead->email }}
Phone: {{ $lead->phone }}
Message: {{ $lead->message }}



@component('mail::button', ['url' => ""])
Browse newest listings
@endcomponent

Thanks,<br>
Daron
@endcomponent
