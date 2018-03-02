<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Lead;
use Illuminate\Support\Facades\Mail;

class SendLeadEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $lead;
    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, Lead $lead)
    {
        $this->lead = $lead;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($request->email)->send(new LeadCreated($lead));
    }
}
