<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class UpdateHomePathListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Authenticated $event): void
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('admin')) {
                RouteServiceProvider::$HOME = 'admin/dashboard';
            } else {
                RouteServiceProvider::$HOME = '/dashboard';
            }
        }
    }
}
