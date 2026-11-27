@extends('layouts.app')
@section('title','إدارة النقاط | radbet365')
@section('content')
<section class="section"><div class="eyebrow">لوحة الإدارة</div><h1>إدارة المستخدمين والنقاط</h1><p class="muted">أضف نقاطاً افتراضية أو اخصمها. لا تمثل النقاط أموالاً ولا يمكن سحبها.</p>
@if(session('status'))<p style="color:#83e6a0">{{ session('status') }}</p>@endif
<div style="overflow-x:auto"><table style="width:100%;border-collapse:collapse;min-width:650px"><thead><tr><th style="text-align:right;padding:12px;border-bottom:1px solid #444">المستخدم</th><th style="padding:12px;border-bottom:1px solid #444">الرصيد</th><th style="padding:12px;border-bottom:1px solid #444">تعديل النقاط</th></tr></thead><tbody>
@foreach($users as $member)<tr><td style="padding:12px;border-bottom:1px solid #333">{{ $member->name }}<br><small class="muted">{{ $member->email }}</small></td><td style="padding:12px;text-align:center;border-bottom:1px solid #333">{{ number_format($member->wallet?->points ?? 0) }} pts</td><td style="padding:12px;border-bottom:1px solid #333"><form method="POST" action="{{ route('admin.points.adjust',$member) }}" style="display:flex;gap:8px;flex-wrap:wrap">@csrf<input type="number" name="amount" placeholder="+100 أو -50" required min="-100000000" max="100000000" style="max-width:130px"><input name="reason" placeholder="السبب (اختياري)" maxlength="160" style="max-width:160px"><button class="btn" type="submit" style="margin:0">تحديث</button></form></td></tr>@endforeach
</tbody></table></div><div style="margin-top:20px">{{ $users->links() }}</div>
</section>
@endsection
