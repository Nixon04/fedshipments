<x-mail::message>
You Recieved a mail from {{ $email }}

This is the message
---

{{ $message }}

---

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
