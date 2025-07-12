<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    // پردازش لاگین
    public function login(Request $request)
    {
        // اعتبارسنجی ورودی‌ها
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // تلاش برای لاگین با remember
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // موفقیت در لاگین، بازنشانی جلسه قبلی برای جلوگیری از session fixation
            $request->session()->regenerate();

            // ریدایرکت بر اساس نقش
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.index'));
            } else {
                return redirect()->intended(route('index'));
            }
        }

        // لاگین ناموفق: برگشت با خطا
        return back()->withErrors([
            'email' => 'ایمیل یا رمز عبور اشتباه است.',
        ])->onlyInput('email');
    }

    // خروج از سیستم
    public function logout(Request $request)
    {
        Auth::logout();

        // حذف سشن و کوکی
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('index'));
    }

}
