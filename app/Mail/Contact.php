<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Seller;
use App\Models\Sellers;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    private $seller;
    private $sales;
    private $SumSalesTotal;

    public function __construct(Sellers $seller, $sales, $SumSalesTotal)
    {
        $this->seller = $seller;
        $this->sales = $sales;
        $this->SumSalesTotal = $SumSalesTotal;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // from : new Address($this->data['fromEmail'],$this->data['fromName']),
            // subject: $this->data['subject'],   
            from : new Address('gestaovendas@gmail.com','Pedro'),
            subject: 'Relatório de vendas - '.date('d/m/Y'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content( 
            view: 'mail.mailReport',
            with: [
                'seller' => $this->seller,
                'sales' => $this->sales,
                'value_total' => $this->SumSalesTotal
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
