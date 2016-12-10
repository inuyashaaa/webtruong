<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailDetai extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $user = $this->user;
        $mailer->send('email.quyendetai', ['users' => $this->user], function ($message) use ($user) {
            $message->from('uetmail.web@gmail.com', 'UET-WebMail');
            $message->to($user->email, $user->name)->subject('Thông báo quyền đăng ký đề tài');
        });
    }
}
