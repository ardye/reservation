<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Event;
use App\Menu;
use App\Fasilitas;

class DashboardController extends Controller
{
        public function index()
    {
    	$jumlahBooking = Booking::where('status', 'Booked')->count();
    	$event = Event::select('namaEvent')->orderBy('tanggalMulai', 'desc')->limit(1)->get();
    	$menu = Menu::count();
    	$fasilitas = Fasilitas::count();
        return view('admin.dashboard.index', compact('jumlahBooking', 'event', 'menu', 'fasilitas'));
    }
}