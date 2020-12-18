@component('mail::message')
#A Heading

Welcome to our {{ env('APP_NAME') }}

Thing YOu Cna Do Here

- Kill
- Feast
- Fuck
- Eat

@component('mail::button', ['url'=>'https://facebook.com'])
    Find Us On Facbook
@endcomponent

@component('mail::button', ['url'=>'https://google.com/signin'])
    Find Us On Google
@endcomponent

@endcomponent
