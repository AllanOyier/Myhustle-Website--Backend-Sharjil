<?php

namespace App\Jobs;

use App\Mail\UserRegisteredMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendUserRegisteredEmail implements ShouldQueue
{
    use Queueable , SerializesModels;


     public int $tries = 3;
    public int $timeout = 30;

    
    /**
     *
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)
            ->send(new UserRegisteredMail($this->user));
    }
}
