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

namespace Rinvex\Fort\Contracts;

use Closure;

interface VerificationBrokerContract
{
    /**
     * Constant representing a successfully sent verification email.
     *
     * @var string
     */
    const REQUEST_SENT = 'rinvex.fort::message.verification.email.request_sent';

    /**
     * Constant representing a successfully verified email.
     *
     * @var string
     */
    const EMAIL_VERIFIED = 'rinvex.fort::message.verification.email.verified';

    /**
     * Constant representing an invalid user.
     *
     * @var string
     */
    const INVALID_USER = 'rinvex.fort::message.verification.email.invalid_user';

    /**
     * Constant representing an invalid token.
     *
     * @var string
     */
    const INVALID_TOKEN = 'rinvex.fort::message.verification.email.invalid_token';

    /**
     * Send a user verification link.
     *
     * @param array         $credentials
     * @param \Closure|null $callback
     *
     * @return string
     */
    public function sendVerificationLink(array $credentials, Closure $callback = null);

    /**
     * Verify given account.
     *
     * @param array    $credentials
     * @param \Closure $callback
     *
     * @return mixed
     */
    public function verify(array $credentials, Closure $callback);
}
