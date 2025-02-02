<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user') {
                $room = Room::all();
                return view('home.index', compact('room'));
            } else if ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        $room = Room::all();
        return view('home.index', compact('room'));
    }

    public function kamar_tambah()
    {
        return view('admin.kamar_tambah');
    }

    public function create_kamar(Request $request)
    {
        $data = new Room;
        $data->nama_kamar = $request->kamar;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->wifi = $request->wifi;
        $data->type_kamar = $request->type;
        $gambar = $request->gambar;
        if ($gambar) {
            $gambarnama = time() . '.' . $gambar->getClientOriginalExtension();
            $request->gambar->move('room', $gambarnama);
            $data->gambar = $gambarnama;
        }
        $data->save();
        return redirect()->back()->with('success', 'Kamar berhasil di tambahkan');
    }

    public function data_kamar()
    {
        $data = Room::all();
        return view('admin.data_kamar', compact('data'));
    }

    public function kamar_update($id)
    {
        $data = Room::find($id);
        return view('admin.kamar_update', compact('data'));
    }

    public function update_kamar(Request $request, $id)
    {
        $data = Room::find($id);

        $data->nama_kamar = $request->kamar;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->wifi = $request->wifi;
        $data->type_kamar = $request->type;
        $gambar = $request->gambar;
        if ($gambar) {
            $gambarnama = time() . '.' . $gambar->getClientOriginalExtension();
            $request->gambar->move('room', $gambarnama);
            $data->gambar = $gambarnama;
        }
        $data->save();
        return redirect('data_kamar')->with('success', 'Kamar Berhasil di update');
    }

    public function delete_kamar($id)
    {
        $data = Room::find($id);
        $data->delete();
        return redirect('data_kamar')->with('success', 'Kamar berhasil di delete');
    }
    public function data_booking(){
        $booking = Booking::with('room')->get();
        return view('admin.data_booking', compact('booking'));
    }
    
    public function booking_update($id){
        $booking = Booking::find($id);
        return view('admin.booking_update', compact('booking'));
    }

    public function update_booking(Request $request, $id){

        $booking = Booking::find($id);

        $booking->nama = $request->nama;
        $booking->email = $request->email;
        $booking->telepon = $request->telepon;
        $booking->start_date = $request->startDate;
        $booking->end_date = $request->endDate;
        $booking->status = $request->status;
        $booking->save();
        return redirect('data_booking')->with('success', 'Booking berhasil di update');
    }

    public function delete_booking($id){
        $booking = Booking::find($id);
        $booking->delete();
        return redirect('data_booking')->with('success', 'Booking berhasil di delete');
    }

}
