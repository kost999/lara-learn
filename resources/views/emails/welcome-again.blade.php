@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'https://laracasts.com'])
Laracasts
@endcomponent

@component('mail::panel', ['url' => ''])
    Lorem ipsum dolor sit amet.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
