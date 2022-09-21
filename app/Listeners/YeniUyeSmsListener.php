<?php

namespace App\Listeners;

use App\Events\YeniUyeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
class YeniUyeSmsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\YeniUyeEvent  $event
     * @return void
     */
    public function handle(YeniUyeEvent $event)
    {
        //
         Log::info('Burası tetiklendi sms gönderildi.');
    }
}
