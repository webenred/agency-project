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

    
}
