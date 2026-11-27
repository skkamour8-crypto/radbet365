@extends('layouts.app')
@section('title','إنشاء حساب | radbet365')
@section('content')
<section class="section" style="max-width:520px;margin:auto"><h1>إنشاء حساب</h1><p class="muted">يبدأ كل حساب جديد بصفر نقطة افتراضية.</p>
<form method="POST" action="{{ route('register') }}">@csrf
<label>الاسم</label><input name="name" value="{{ old('name') }}" required maxlength="100" autocomplete="name">
<label>البريد الإلكتروني</label><input type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
<label>كلمة المرور (10 أحرف على الأقل)</label><input type="password" name="password" required minlength="10" autocomplete="new-password">
<label>تأكيد كلمة المرور</label><input type="password" name="password_confirmation" required minlength="10" autocomplete="new-password">
@foreach($errors->all() as $error)<p style="color:#ff7b84">{{ $error }}</p>@endforeach
<button class="btn" type="submit">إنشاء الحساب</button></form><p class="muted">لديك حساب؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p></section>
@endsection
