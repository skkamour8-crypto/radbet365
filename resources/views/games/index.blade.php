@extends('layouts.app')
@section('title','الألعاب | radbet365')
@section('content')
<section class="section"><div class="eyebrow">مكتبة الترفيه</div><h1>كل الألعاب</h1><p class="muted">تجارب ترفيهية بنقاط افتراضية فقط.</p><div class="grid">@forelse($games as $game)<article class="game"><div class="ico">🎲</div><strong>{{ $game->name }}</strong><p>{{ $game->description }}</p><span class="muted">{{ $game->category }}</span></article>@empty<p>لا توجد ألعاب مضافة حالياً.</p>@endforelse</div><div style="margin-top:24px">{{ $games->links() }}</div></section>
@endsection
