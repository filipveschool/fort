<?php

/*
 * NOTICE OF LICENSE
 *
 * Part of the Rinvex Fort Package.
 *
 * This source file is subject to The MIT License (MIT)
 * that is bundled with this package in the LICENSE file.
 *
 * Package: Rinvex Fort Package
 * License: The MIT License (MIT)
 * Link:    https://rinvex.com
 */

namespace Rinvex\Fort\Http\Requests;

use Illuminate\Support\Facades\Auth;

class PhoneVerificationRequest extends PhoneVerification
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = Auth::guard()->user() ?: Auth::guard()->attemptUser();

        return $this->isMethod('post') ? [
            'phone'  => 'required|numeric|exists:'.config('rinvex.fort.tables.users').',phone,id,'.$user->id.',phone_verified,1',
            'method' => 'required',
        ] : [];
    }
}
