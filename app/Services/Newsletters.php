<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

interface Newsletters
{
    public function __construct(ApiClient $mailchimp);

    public function subscribe(string $email, string $list = null);

}
