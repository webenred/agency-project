<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Notification;
use App\Traits\HttpResponses;

class EmailVerificationNotificationController extends Controller
{
    use HttpResponses;
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $this->success([
                'status' => 'redirect',
                'redirect' => session()->get('url.intended', url('/'))
            ], 'email verified', 200);
        }

        Notification::send($request->user(), new VerifyEmailNotification);

        return $this->success([
            'status' => 'verification-link-sent'
        ], "verification link sent successfully", 200);
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
}
