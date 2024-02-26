<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Resend\Laravel\Facades\Resend;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;

    protected $html;

    /**
     * Create a new job instance.
     */
    public function __construct(string $email, string $html)
    {
        $this->email = $email;
        $this->html = $html;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Resend::emails()->send([
            'from' => 'WinKo <onboarding@resend.dev>',
            'to' => [$this->email],
            'subject' => 'Email from Laravel Playground',
            'html' => $this->html,
        ]);
    }
}
