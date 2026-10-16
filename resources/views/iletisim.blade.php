@extends('layouts.master')
@section('title', 'İletişim')
@section('content')
<main id="main-content" class="wrap interior-page contact-page">
    <header class="page-intro"><span class="eyebrow">İLETİŞİM</span><h1>Bir not bırak,<br><span>sohbet edelim.</span></h1><p>Bir fikrin, sorun ya da paylaşmak istediğin bir şey varsa aşağıdaki formu kullanabilirsin.</p></header>
    <section class="contact-layout">
        <aside class="contact-aside"><div class="contact-icon" aria-hidden="true">✳</div><h2>Her güzel sohbet<br>bir merhaba ile başlar.</h2><p>Mesajını okumaktan memnuniyet duyarım.</p><div class="contact-aside-rule"></div><span class="eyebrow">YANIT SÜRESİ</span><p class="reply-note">İlk fırsatta dönüş yapmaya çalışıyorum.</p></aside>
        <div class="contact-form-wrap"><h2>Mesajını yaz</h2><p class="form-intro">Formu doldur, sana geri dönüş yapayım.</p>
            <form id="contactForm" class="contact-form" data-sb-form-api-token="API_TOKEN">
                <label for="name">Adın</label><input id="name" name="name" type="text" placeholder="Adını yaz" autocomplete="name" data-sb-validations="required" />
                <label for="email">E-posta adresin</label><input id="email" name="email" type="email" placeholder="ornek@email.com" autocomplete="email" data-sb-validations="required,email" />
                <label for="phone">Telefon numaran <span>(isteğe bağlı)</span></label><input id="phone" name="phone" type="tel" placeholder="+90 5xx xxx xx xx" autocomplete="tel" />
                <label for="message">Mesajın</label><textarea id="message" name="message" rows="5" placeholder="Aklındakileri buraya yaz..." data-sb-validations="required"></textarea>
                <button class="button button-primary" id="submitButton" type="submit">Mesajı gönder <span aria-hidden="true">↗</span></button>
            </form>
        </div>
    </section>
</main>
@endsection
