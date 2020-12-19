@component('mail::message')

Welcome to {{ env('APP_NAME') }}, MR. {{ $name }}

Please read our community guidelines.

You can use our platform to:

    ↓ Features:

- Read new Articles
- Post new Articles
- Participate in Community Discussions
- Collaborate With Other Members.

@component('mail::button', ['url'=>'https://facebook.com'])
    Find Us On Facebook!
@endcomponent

@endcomponent
