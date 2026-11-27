@extends('layouts.app')
@section('title','تسجيل الدخول | radbet365')
@section('content')
<section class="section" style="max-width:520px;margin:auto"><h1>تسجيل الدخول</h1>
<form method="POST" action="{{ route('login') }}">@csrf
<label>البريد الإلكتروني</label><input type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
<label>كلمة المرور</label><input type="password" name="password" required autocomplete="current-password">
<label style="display:flex;gap:8px;align-items:center"><input type="checkbox" name="remember" value="1" style="width:auto"> تذكرني</label>
@foreach($errors->all() as $error)<p style="color:#ff7b84">{{ $error }}</p>@endforeach
<button class="btn" type="submit">دخول</button></form><p class="muted">ليس لديك حساب؟ <a href="{{ route('register') }}">إنشاء حساب</a></p></section>
@endsection
