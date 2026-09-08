<x-mail::message>
# CV Code Request

Someone asked for a code to download your CV from iainco.com.

**Name** {{ $name }}<br/>
**Email** {{ $email }}<br/><br/>

To create one, run `php artisan cv:code create --entity="{{ $name }}"` and email them the link.
</x-mail::message>
