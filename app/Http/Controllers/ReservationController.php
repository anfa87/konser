<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reservations = Reservation::all();
        return view('dashboard.data_pemesanan',[
            'reservations' => $reservations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataValid = $request->validate([
            'name' => 'required|min:3|max:100',
            'no_hp' => 'required|max:13',
            'email' => 'required|email:dns|max:50',
            
            
        ],
        [
            
            'name.required' => 'Nama Lengkap harus diisi!',
            'name.min' => 'Nama Lengkap minimal 3 karakter!',
            'name.max' => 'Nama Lengkap maksimal 100 karakter!',
            'no_hp.required' => 'Harap diisi!',
            'no_hp.max' => 'Maksimal 12 karakter!',
            'email.required' => 'Harap diisi!',
            'email.email' => 'Email salah!',
            'email.max' => 'Maksimal 50 karakter!',
           

        ]);

        $kode_baru = date('d').date('m').date('y');

        $today = Reservation::where('created_at','like',"%".date('Y-m-d')."%")->get()->last();

        
        
       if ($today) {
           $kode_lama = $today->ticket_id;
           $kode_lama = substr($kode_lama,6,3);

           $kode_lama = $kode_lama + 1;
           
           if (strlen($kode_lama) == 1 ) {
               $kode_lama ='00'.$kode_lama;
           } else if (strlen($kode_lama) == 2) {
            $kode_lama ='0'.$kode_lama;
           } else {
               $kode_lama;
           }

           $kode_baru = $kode_baru.$kode_lama;
       } else{
           $kode_baru = $kode_baru . '001';
       }

       $dataValid['ticket_id'] = $kode_baru;

        Reservation::create($dataValid);
        
        return redirect('/#reservation')->with('sukses', "Anda berhasil memesan tiket! (Id Tiket anda : ".$dataValid['ticket_id'].") -> Harap catat atau screenshoot ID Tiket anda!"  );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $data_pemesanan)
    {
       

        $dataValid = $request->validate([
            'name' => 'required',
            'no_hp' => 'required|max:13',
            'email' => 'required',
            'status' => 'required'
            
        ],
        [
            'name.required' => 'Harap masukkan nama lengkap!',
            'no_hp.required' => 'Harap masukkan no hp!',
            'no_hp.max' => 'No Hp maksimal 13 karakter!'
            

        ]);

        Reservation::where('id', $data_pemesanan->id)
            ->update($dataValid);

        return redirect('/admin/data_pemesanan')->with('sukses', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        Reservation::destroy($reservation->id);
    }
}
