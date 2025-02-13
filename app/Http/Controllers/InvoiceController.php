<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class InvoiceController extends Controller
{
    public function invoice($id)
    {
        $booking = Booking::where('user_id', auth()->id())->latest()->first();
        if(!$booking){
            return redirect()->back()->with('error', 'Tidak ada booking ditemukan');
        }
        $pdf = Pdf::loadView('invoices.invoice', compact('booking'));
        $filename = 'Invoice_'. $booking->id . '.pdf';

        return $pdf->download($filename);
    }
}
