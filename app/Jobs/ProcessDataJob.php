<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public readonly string $taskName,
        public readonly int $iterations = 5
    ) {}

    public function handle(): void
    {
        Log::info("Starting job: {$this->taskName}");
        
        for ($i = 1; $i <= $this->iterations; $i++) {
            Log::info("Job {$this->taskName} - Iteration {$i}/{$this->iterations}");
            sleep(1);
        }
        
        Log::info("Completed job: {$this->taskName}");
    }
}