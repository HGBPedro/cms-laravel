<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\LogMail;

class SendLogEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $logData;

    public function __construct($logData)
    {
        $this->logData = $logData;
    }

    public function handle()
    {
        $recipient = env('RECIPIENT_EMAIL');

        try {
            Mail::to($recipient)->send(new LogMail($this->logData));
        } catch (Exception $e) {
            Log::error('Job failed: '.$e->getMessage());
        }
    }
}
