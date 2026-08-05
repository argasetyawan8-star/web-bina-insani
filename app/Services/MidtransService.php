<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\Registration;
use Midtrans\Snap;

class MidtransService
{
    /**
     * Generate Snap Token
     */
    public function createSnapToken(Registration $registration): string
    {
        // Jika payment sudah ada dan masih memiliki snap token
        $payment = Payment::where('registration_id', $registration->id)->first();

        if ($payment && $payment->snap_token) {
            return $payment->snap_token;
        }

        // Generate Order ID
        $orderId = 'BI-' . now()->format('YmdHis') . '-' . $registration->id;

        $params = [

            'transaction_details' => [

                'order_id' => $orderId,

                'gross_amount' => (int) $registration->program->registration_fee,

            ],

            'customer_details' => [

                'first_name' => $registration->full_name,

                'email' => $registration->email,

                'phone' => $registration->phone,

            ],

            'item_details' => [

                [

                    'id' => $registration->program->id,

                    'price' => (int) $registration->program->registration_fee,

                    'quantity' => 1,

                    'name' => 'Biaya Pendaftaran - ' . $registration->program->name,

                ]

            ],

        ];

        $snapToken = Snap::getSnapToken($params);

        // Simpan Payment
        $payment = Payment::create([

            'registration_id' => $registration->id,

            'order_id' => $orderId,

            'snap_token' => $snapToken,

            'amount' => $registration->program->registration_fee,

            'status' => 'pending',

        ]);

        return $payment->snap_token;
    }
}