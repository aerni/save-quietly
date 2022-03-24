<?php

namespace App\Listeners;

use App\Jobs\SaveQuietlyJob;
use Statamic\Events\EntrySaved;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveQuietlyListener implements ShouldQueue
{
    public function handle(EntrySaved $event): void
    {
        SaveQuietlyJob::dispatch($event->entry);
    }
}
