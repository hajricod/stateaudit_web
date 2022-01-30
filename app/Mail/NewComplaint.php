<?php

namespace App\Mail;

use App\Models\Complaint;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewComplaint extends Mailable
{
    use Queueable, SerializesModels;

    public $complaint;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Complaint $complaint)
    {
        $this->complaint = $complaint;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('complaints@sai.gov.om')
        ->to('asalhajri@sai.gov.om')
        ->subject(__('New Complaint'))
        ->locale(lang())
        
        ->markdown('emails.complaints.new');
    }
}
