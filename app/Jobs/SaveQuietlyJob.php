<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Statamic\Contracts\Entries\Entry;

class SaveQuietlyJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;

    public function __construct(protected Entry $entry)
    {
    }

    public function handle(): void
    {
        ray('This will only hit when saving the first time.');

        $this->entry
            ->merge(['foo' => 'bar'])
            ->saveQuietly();
    }
}
