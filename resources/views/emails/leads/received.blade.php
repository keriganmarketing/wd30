@component('mail::message')
# New Lead Notification

You have received a new lead from your website! The details are below:

Name: {{ $lead->name }}

Email: {{ $lead->email }}

Phone: {{ $lead->phone }}

Message: {{ $lead->message }}

@if ($lead->listing)
   MLS#: {{ $lead->listing }}

   Address: {{ $lead->listing_address }}
@endif

@component('mail::button', ['url' => ''])
View Lead
@endcomponent

@endcomponent
