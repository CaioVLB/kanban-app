<?php

namespace App\Listeners;

use App\Enums\ProfileEnum;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetCompanyIdInSession
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
    public function handle(object $event): void
    {
        if (
          $event->user->profile_id == ProfileEnum::ADMIN ||
          $event->user->profile_id == ProfileEnum::MANAGER ||
          $event->user->profile_id == ProfileEnum::COLLABORATOR
        ) {
          session()->put('company_id', $event->user->company_id);
        }
    }
}
