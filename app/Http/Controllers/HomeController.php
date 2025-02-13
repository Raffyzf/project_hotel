<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function kamar_detail($id)
    {
        $room = Room::find($id);
        return view('home.kamar_detail', compact('room'));
    }

    public function booking_kamar(Request $request, $id)
    {

        if (!Auth()->check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }

        $request->validate(
            [
                'startDate' => 'required|date',
                'endDate' => 'date|after:startDate',
            ],
            [
                'startDate.required' => 'Tanggal mulai harus diisi.',
                'startDate.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
                'endDate.date' => 'Tanggal akhir harus berupa tanggal yang valid.',
                'endDate.after' => 'Tanggal akhir harus setelah tanggal mulai.',
            ]
        );

        $data = new Booking;

        $data->room_id = $id;
        $data->user_id = Auth()->user()->id;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->telepon = $request->telepon;

        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $isBooked = Booking::where('room_id', $id)->where('start_date', '<=', $endDate)->where('end_date', '>=', $startDate)->exists();
        if ($isBooked) {
            return redirect()->back()->with('message', 'Kamar ini sudah dibooking di tanggal tersebut');
        } else {
            $data->start_date = $request->startDate;
            $data->end_date = $request->endDate;
            $data->save();
            return redirect()->back()->with('message', 'Kamar berhasil dipesan');
        }
    }
}
