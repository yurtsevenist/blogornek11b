<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:50'],
        ], $this->validationMessages());

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'E-posta veya şifre hatalı.'])->onlyInput('email');
        }

        $request->session()->regenerate();

        $request->user()->forceFill([
            'last_login_at' => now(),
            'last_login_device' => Str::limit($request->userAgent() ?: 'Bilinmiyor', 255, ''),
            'last_login_ip' => $request->ip(),
        ])->save();

        if (in_array($request->user()->role, ['yönetici', 'editör'], true)) {
            return redirect()->route('admin.dashboard');
        }

        if ($request->user()->role === 'kullanıcı') {
            return redirect('/');
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->withErrors([
            'email' => 'Hesabınıza atanmış geçerli bir rol bulunamadı. Yöneticiyle iletişime geçin.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:50', 'confirmed'],
        ], $this->validationMessages());

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'kullanıcı',
            'last_login_at' => now(),
            'last_login_device' => Str::limit($request->userAgent() ?: 'Bilinmiyor', 255, ''),
            'last_login_ip' => $request->ip(),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email:rfc,dns', 'max:255'],
        ], $this->validationMessages());

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm(Request $request, string $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    public function reset(Request $request)
    {
        $data = $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:50', 'confirmed'],
        ], $this->validationMessages());

        $status = Password::reset($data, function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password),
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));
        });

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    private function validationMessages(): array
    {
        return [
            'name.required' => 'Ad soyad alanı zorunludur.',
            'name.string' => 'Ad soyad metin biçiminde olmalıdır.',
            'name.min' => 'Ad soyad en az 3 karakter olmalıdır.',
            'name.max' => 'Ad soyad en fazla 100 karakter olabilir.',
            'email.required' => 'E-posta adresi alanı zorunludur.',
            'email.email' => 'RFC biçimine uygun, geçerli bir e-posta adresi girin.',
            'email.max' => 'E-posta adresi en fazla 255 karakter olabilir.',
            'email.unique' => 'Bu e-posta adresi zaten kayıtlı.',
            'password.required' => 'Şifre alanı zorunludur.',
            'password.string' => 'Şifre metin biçiminde olmalıdır.',
            'password.min' => 'Şifre en az 8 karakter olmalıdır.',
            'password.max' => 'Şifre en fazla 50 karakter olabilir.',
            'password.confirmed' => 'Şifre tekrarı eşleşmiyor.',
            'token.required' => 'Şifre yenileme anahtarı eksik veya geçersiz.',
        ];
    }
}
