@extends('layouts.app')
@section('title','radbet365 | ألعاب ترفيهية')
@section('content')
<section class="hero"><div class="eyebrow">منصة ألعاب ترفيهية</div><h1>العب، استمتع،<br><span style="color:#e32636">واجمع النقاط الافتراضية</span></h1><p>مرحباً بك في radbet365. اكتشف ألعاباً خفيفة وتجارب ترفيهية ضمن رصيد نقاط افتراضي، دون أموال حقيقية أو إيداعات أو سحوبات.</p><a class="btn" href="{{ route('games.index') }}">اكتشف الألعاب</a></section>
<section class="section"><h2>ألعاب مختارة</h2><div class="grid">@forelse($games as $game)<article class="game"><div class="ico">🎮</div><strong>{{ $game->name }}</strong><p>{{ $game->description }}</p></article>@empty<div class="game"><div class="ico">🕹️</div><strong>الألعاب قيد الإعداد</strong><p>ستظهر الألعاب هنا بعد إضافتها من قاعدة البيانات.</p></div>@endforelse</div></section>
@endsection
