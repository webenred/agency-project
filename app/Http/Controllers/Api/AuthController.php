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

    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['logout', 'verifyEmail', 'resetRequest', 'resetPassword', 'newPassword']);
        $this->middleware('verified')->only(['resetRequest', 'resetPassword', 'newPassword']);
    }

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

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return $this->success(null, "disconnected successfully", 200);
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
            return $this->success(['redirect' => route('dashboard')], 'Email verified successfully');
        }
    }




    // /**
    //  * @param Request $request 
    //  * @return JsonResponse 
    //  * this controller send an email contains a code for reseting password
    //  * 
    //  */
    // public function resetRequest(Request $request) : JsonResponse
    // {
    //     if (!$request->user()->hasVerifiedEmail()) {
    //         $this->error(null, 'You must verify your email address', 401);
    //     }

    //     Notification::send($request->user(), new ResetPasswordNotification);
    //     return $this->success(null, "We've email you reset code", 200);
    // }

    // /**
    //  * @param Request $request
    //  * @return JsonResponse
    //  * this controller verify the code input, if he is valid that regenerate a new token 
    //  */
    // public function resetPassword(Request $request) : JsonResponse
    // {
    //     $request->validate([
    //         'code' => ['required', 'max:6']
    //     ]);

    //     $verification = DB::table('verification_codes')
    //         ->where('user_uuid', '=', $request->user()->uuid)
    //         ->where('code', '=', $request->code)
    //         ->where('type', '=', 'password')
    //         ->first();

    //     if (!$verification) {
    //         return $this->error(null, 'This code does not exist', 404);
    //     }

    //     if (Carbon::parse($verification->invalidated_at)->isPast()) {
    //         return $this->error(null, 'Your code is invalid', 410);
    //     }

    //     $request->user()->currentAccessToken()->delete();
    //     return $this->success(
    //         ['token' => $request->user()->createToken('API Token Of ' . $request->user()->email)->plainTextToken]
    //     , 'user verified', 200);
    // }

    // /**
    //  * @param Request $request 
    //  * @return JsonResponse
    //  * this controller for setting a new password
    //  */
    // public function newPassword(Request $request) : JsonResponse
    // {
    //     $request->validate([
    //         'password' => ['required', Rules\Password::defaults()]
    //     ]);

    //     $status = $request->user()->update([
    //         'password' => Hash::make($request->password)
    //     ]);

    //     if ($status) {
    //         return $this->success($request->user(), 'Password reset successfully', 200);
    //     }
    //     return $this->error(null, 'Password not reset', '400');
    // }
}
