<!doctype html>
<html lang="ar" dir="rtl">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="theme-color" content="#111">
<title>@yield('title','radbet365')</title>
<style>
:root{--bg:#101010;--red:#e32636;--muted:#aaa;--line:#303030}*{box-sizing:border-box}
body{margin:0;background:radial-gradient(circle at top right,#351116 0,transparent 34%),var(--bg);color:#fff;font-family:Tahoma,Arial,sans-serif;line-height:1.7}
a{color:inherit;text-decoration:none}.wrap{width:min(1120px,92%);margin:auto}.nav{border-bottom:1px solid var(--line);background:#111e;position:sticky;top:0;backdrop-filter:blur(12px);z-index:2}
.navin{display:flex;align-items:center;justify-content:space-between;padding:15px 0;gap:12px}.brand{font-size:24px;font-weight:900}.brand span{color:var(--red)}.links{display:flex;gap:18px;align-items:center;color:#ddd;font-size:14px;flex-wrap:wrap}
.hero{padding:76px 0 55px}.eyebrow{color:#ff6672;font-size:13px}.hero h1{font-size:clamp(30px,6vw,54px);line-height:1.2;margin:12px 0}.hero p{color:#bbb;max-width:650px}
.btn{display:inline-block;background:var(--red);color:white;border:0;padding:11px 20px;border-radius:9px;font-weight:bold;margin-top:12px;cursor:pointer;font-size:14px}.section{padding:28px 0 55px}.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px}.game{background:linear-gradient(145deg,#242424,#171717);border:1px solid var(--line);border-radius:15px;padding:22px;min-height:150px}.game .ico{font-size:30px}.game p,.muted{color:var(--muted);font-size:14px}
input{display:block;width:100%;padding:12px;margin:7px 0 16px;background:#191919;color:white;border:1px solid #444;border-radius:8px}label{display:block;font-size:14px;color:#ddd}
.footer{border-top:1px solid var(--line);padding:25px 0;color:#888;font-size:12px}
@media(max-width:600px){.links{gap:9px;font-size:12px}.brand{font-size:20px}.hero{padding:55px 0 35px}.navin{align-items:flex-start}}
</style>
</head>
<body>
<header class="nav"><div class="wrap navin"><a class="brand" href="{{ route('home') }}">rad<span>bet</span>365</a><nav class="links"><a href="{{ route('home') }}">الرئيسية</a><a href="{{ route('games.index') }}">الألعاب</a><a href="{{ route('about') }}">حول المنصة</a>
@auth
@if(auth()->user()->is_admin)<a href="{{ route('admin.index') }}">الإدارة</a>@endif
<span>{{ number_format(auth()->user()->wallet?->points ?? 0) }} pts</span>
<form method="POST" action="{{ route('logout') }}" style="margin:0">@csrf<button type="submit" style="background:none;border:0;color:#ff7b84;cursor:pointer">خروج</button></form>
@else
<a href="{{ route('login') }}">دخول</a><a href="{{ route('register') }}">حساب جديد</a>
@endauth
</nav></div></header>
<main class="wrap">
@if(session('status'))<p style="color:#83e6a0;padding-top:12px">{{ session('status') }}</p>@endif
@yield('content')
</main>
<footer class="footer"><div class="wrap">radbet365 — منصة ترفيهية بنقاط افتراضية فقط. لا أموال حقيقية ولا إيداع أو سحب.</div></footer>
</body></html>
