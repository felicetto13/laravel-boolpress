@component('mail::message')
# Introduction

<h1>Post creato con successo</h1>

<p>Grazie per aver scelto con successo la nostra piattaforma!</p>

<p>Entra e crea quanti post vuoi!</p>
@component('mail::button', ['url' => '{{ route("admin.posts.show", $post->slug) }}'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
