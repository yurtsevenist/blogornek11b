@extends('layouts.master')
@section('title', 'Hakkımda')
@section('content')
<main id="main-content" class="wrap interior-page">
    <header class="page-intro"><span class="eyebrow">KISACA BEN</span><h1>Merakla başlayan<br><span>bir yolculuk.</span></h1><p>Bu alan, nelerden ilham aldığımı ve burada neyi paylaşmak istediğimi anlattığım küçük bir köşe.</p></header>
    <section class="about-layout">
        <div class="about-visual" aria-hidden="true"><div class="about-initial">N<span>.</span></div><div class="about-caption">Düşünmek · Öğrenmek · Paylaşmak</div></div>
        <div class="about-copy"><span class="eyebrow">HİKÂYEM</span><h2>Selam, ben bu sayfanın yazarıyım.</h2><p>Yeni fikirlerin peşinden gitmeyi, öğrendiklerimi not etmeyi ve farklı bakış açılarını keşfetmeyi seviyorum. Bu blog, tüm bu notları bir araya getirmek için açtığım kişisel bir alan.</p><p>Burada düşünceler, üretkenlik, öğrenme ve gündelik hayatta karşıma çıkan küçük keşifler üzerine yazıyorum. Her yazı, biraz daha dikkatli bakma ve öğrendiklerimi paylaşma fırsatı.</p><div class="about-tags"><span>Merak</span><span>Notlar</span><span>Yeni fikirler</span></div><a class="text-link" href="{{ url('blog-yazilarim') }}">Yazılarıma göz at <span aria-hidden="true">→</span></a></div>
    </section>
    <section class="values-row"><div><span class="value-index">01</span><h3>Sürekli öğren</h3><p>Her gün yeni bir şey keşfetmeye açık kal.</p></div><div><span class="value-index">02</span><h3>Sade anlat</h3><p>Karmaşık fikirleri anlaşılır kılmaya çalış.</p></div><div><span class="value-index">03</span><h3>Paylaş</h3><p>Bir not, başka bir fikrin başlangıcı olabilir.</p></div></section>
</main>
@endsection
