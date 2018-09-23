<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Http\Requests;
use App\Http\Requests\BookingRequest;
use Datatables;
use Session;

class BookedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.booked.index');
    }

    public function dataBooked(Request $request) 
    {
        if($request->ajax()){
        $getBooked = Booking::with('user')->select('booking.*')->orderBy('booking.waktu', 'desc');

        return Datatables::of($getBooked)
            ->addColumn('action', function ($booked) {
                return "
                    <button class='delete-modal btn btn-danger btn-sm btn-flat' data-id='".$booked->idBooking."' data-name='".$booked->user->nama."'>
                            <i class='fa fa-trash'></i>
                        </button>";
            })
            ->make(true);

        } else {
            exit("Not an AJAX request -_-");
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($status)
    {
        $booked = Booking::findOrFail($status);

        $booked->update(['status' => 'Finish']);
        return redirect('booked');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Booking::find($request->id)->delete();
        Session::flash('flash_message', 'Data berhasil dihapus');
        Session::flash('penting', 'true');
        return response ()->json ();
    }
}
