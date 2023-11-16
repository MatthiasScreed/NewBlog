<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

interface Newsletters
{
    public function __construct(protected ApiClient $client, protected string $foo)
    {

    }

    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us21'
        ]);

        return $mailchimp->lists->addListMember($list,[
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

    public function subscribe(string $email, string $list = null);
}
