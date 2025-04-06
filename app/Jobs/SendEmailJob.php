<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\JobNotificationMail;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $username;
    protected $status;
    protected $user_email;

    public function __construct($username, $status, $user_email)
    {
        $this->username = $username;
        $this->status = $status;
        $this->user_email = $user_email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $mail = new JobNotificationMail($this->username,$this->status);

        Mail::to($this->user_email)->send($mail);
    }
}
