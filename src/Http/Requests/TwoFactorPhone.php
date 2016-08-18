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

use Illuminate\Support\Facades\Lang;
use Rinvex\Support\Http\Requests\FormRequest;

class TwoFactorPhone extends FormRequest
{
    /**
     * {@inheritdoc}
     */
    public function forbiddenResponse()
    {
        return intend([
            'intended'   => route('rinvex.fort.account.page'),
            'withErrors' => ['token' => Lang::get('rinvex.fort::message.verification.twofactor.phone.globaly_disabled')],
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return in_array('phone', config('rinvex.fort.twofactor.providers'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
