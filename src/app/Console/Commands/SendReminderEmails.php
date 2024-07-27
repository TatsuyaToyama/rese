<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Book;
use Carbon\Carbon;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminder-emails';
    protected $description = 'Send reminder emails to users';

    /**
     * The console command description.
     *
     * @var string
     */


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reminders = Book::whereDate('date', Carbon::today())->with('user')->get();

        foreach ($reminders as $reminder) {
            $user = $reminder->user;
            Mail::raw('本日、予約された店があります。Reseをご確認ください。', function ($message) use ($user) {
                $message->to($user->email)->subject('予約リマインダー');
            });
        }

        $this->info('Reminder emails sent successfully.');
    }
}
