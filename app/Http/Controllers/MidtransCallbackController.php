<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MidtransCallbackController extends Controller
{
    public function handle(Request $request)
    {
        Log::info('=== MIDTRANS CALLBACK MASUK ===');

        Log::info($request->all());


        try {

            $notification = new \Midtrans\Notification();


            Log::info([
                'order_id' => $notification->order_id,
                'transaction_status' => $notification->transaction_status,
                'payment_type' => $notification->payment_type,
            ]);


            /*
            |--------------------------------------------------------------------------
            | Cari Payment berdasarkan order_id
            |--------------------------------------------------------------------------
            */

            $payment = Payment::where(
                'order_id',
                $notification->order_id
            )->first();


            Log::info([
                'payment_found' => $payment ? true : false,
                'payment_id' => $payment?->id,
                'registration_id' => $payment?->registration_id,
            ]);


            if (!$payment) {

                Log::error('PAYMENT TIDAK DITEMUKAN');

                return response()->json([
                    'message' => 'Payment not found'
                ], 404);

            }


            /*
            |--------------------------------------------------------------------------
            | Status berhasil
            |--------------------------------------------------------------------------
            */

            if (
                in_array(
                    $notification->transaction_status,
                    [
                        'capture',
                        'settlement'
                    ]
                )
            ) {


                /*
                |--------------------------------------------------------------------------
                | Update Payment
                |--------------------------------------------------------------------------
                */

                $payment->update([

                    'status' => 'paid',

                    'transaction_id' =>
                        $notification->transaction_id,

                    'payment_method' =>
                        $notification->payment_type,

                    'paid_at' =>
                        now(),

                ]);


                Log::info('PAYMENT BERHASIL UPDATE');


                /*
                |--------------------------------------------------------------------------
                | Update Registration
                |--------------------------------------------------------------------------
                */

                $registration = Registration::find(
                    $payment->registration_id
                );


                Log::info([
                    'registration_found' =>
                        $registration ? true : false,

                    'registration_id' =>
                        $payment->registration_id,
                ]);


                if ($registration) {


                    $registration->update([

                        'payment_status' => 'paid',

                        'transaction_id' =>
                            $notification->transaction_id,

                        'payment_type' =>
                            $notification->payment_type,

                        'paid_at' =>
                            now(),

                    ]);


                    Log::info(
                        'REGISTRATION BERHASIL UPDATE'
                    );


                } else {


                    Log::error(
                        'REGISTRATION TIDAK DITEMUKAN'
                    );

                }


            } else {


                Log::info([
                    'STATUS BELUM SELESAI' =>
                        $notification->transaction_status
                ]);

            }


            return response()->json([
                'message' => 'OK'
            ]);


        } catch (\Exception $e) {


            Log::error(
                'MIDTRANS ERROR : ' .
                $e->getMessage()
            );


            return response()->json([
                'message' => 'ERROR'
            ], 500);

        }
    }
}