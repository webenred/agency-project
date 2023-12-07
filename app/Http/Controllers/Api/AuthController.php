<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\HttpResponses;
use App\Models\User;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Events\RegistrationEvent;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(Request $request): JsonResponse
    {

        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        $user = User::Where('email', $request->username)->orWhere('phone', $request->username)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->error(null, 'Credentials do not matche', 401);
        }

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token Of ' . $user->email)->plainTextToken,
        ], 'logged successfully', 200);
    }

    public function verifyEmail(Request $request)
    {
        if ($request->user()->email_verified_at) {
            return $this->success([
                'status' => 'redirect',
                'redirect' => session()->get('url.intended', url('/'))
            ], 'Email verified', 200);
        }

        $request->validate([
            'code' => ['required', 'min:6', 'max:6']
        ]);

        $verificationCode = $request->user()->verificationCodes
            ->where('type', '=', 'email')
            ->where('code', '=', $request->code)
            ->first();


        if (!$verificationCode || Carbon::parse($verificationCode->invalidated_at)->isPast()) {



            return $this->error([
                'status' => 'error'
            ], 'This code is invalid', 410);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
            $verificationCode->delete();
            return $this->success(['redirect' => route('welcome')], 'Email verified successfully');
        }
    }
}
