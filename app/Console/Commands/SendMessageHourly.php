<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendHourlyEmails extends Command
{
    protected $signature = 'send:hourly-emails';
    protected $description = 'Send hourly emails';

    public function handle()
    {
        // Logic to send emails
        // Replace the example code with your own email sending logic

        $users = User::all();

        foreach ($users as $user) {
            $email = $user->email;
            $name = $user->name;

            Mail::raw("This is a sample email sent to $name ($email)", function ($message) use ($email, $name) {
                $message->to($email, $name)
                        ->subject('Hourly Email');
            });
        }

        $this->info('Hourly emails sent successfully.');
    }
}
