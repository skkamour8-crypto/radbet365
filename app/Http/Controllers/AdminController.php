<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function index(): View
    {
        $users = User::query()->with('wallet')->latest()->paginate(20);
        return view('admin.index', compact('users'));
    }

    public function adjustPoints(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'amount' => ['required','integer','between:-100000000,100000000','not_in:0'],
            'reason' => ['nullable','string','max:160'],
        ]);
        DB::transaction(function () use ($request, $user, $data) {
            $wallet = $user->wallet()->lockForUpdate()->firstOrCreate([], ['points'=>0]);
            $newBalance = $wallet->points + (int) $data['amount'];
            if ($newBalance < 0) {
                throw ValidationException::withMessages(['amount'=>'لا يمكن أن يصبح رصيد النقاط أقل من صفر.']);
            }
            $wallet->update(['points'=>$newBalance]);
            DB::table('point_transactions')->insert([
                'user_id'=>$user->id, 'admin_id'=>$request->user()->id,
                'amount'=>(int) $data['amount'], 'balance_after'=>$newBalance,
                'reason'=>$data['reason'] ?? null, 'created_at'=>now(), 'updated_at'=>now(),
            ]);
        });
        return back()->with('status','تم تحديث رصيد النقاط بنجاح.');
    }
}
