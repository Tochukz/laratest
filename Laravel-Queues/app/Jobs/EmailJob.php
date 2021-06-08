<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationEmail;

class EmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public $ccReceiver;

    public $bccReceiver;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(object $emailJob)
    {
        $this->user = $emailJob->user;
        $this->ccReceiver = $emailJob->ccReceiver;
        $this->bccReceiver = $emailJob->bccReceiver;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;
        $ccReceiver = $this->ccReceiver;
        $bccReceiver = $this->bccReceiver;

        Mail::to($user)
            ->cc($ccReceiver)
            ->bcc($bccReceiver)
            ->send(new ConfirmationEmail($user));
    }
}
