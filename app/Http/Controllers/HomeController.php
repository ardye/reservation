<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Event;
use App\User;
use App\Fasilitas;
use App\Review;
use App\Kategori;
use App\Menu;
use App\Http\Requests;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\RegisterRequest;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventTerbaru = Event::orderBy('tanggalMulai')->limit(1)->get();
        $fasilitasData = Fasilitas::all();
        $kategoriData = Kategori::all();
        $menuData = Menu::all();
        return view('home', compact('eventTerbaru', 'fasilitasData','kategoriData','menuData'));
    }

    public function register(RegisterRequest $request) {
        $input = $request->all();
        if($request->hasFile('gambar')) {
            $input['gambar'] = $this->uploadGambar($request);
        }
        $input['password'] = bcrypt($input['password']);
      /** Jalankan method create dengan indikator input pada model Siswa */
        $user = User::create($input);
        Session::flash('flash_message', 'Data anda berhasil disimpan');
        return redirect('/'.'#register');
    }

    public function booking(BookingRequest $request) {
        $input = $request->all();
      /** Jalankan method create dengan indikator input pada model Siswa */
        $input['waktu'] = date('Y-m-d H:i:s', strtotime($input['tanggal']." ".$input['waktu']));
        unset($input['tanggal']);
        $booking = Booking::create($input);
        Session::flash('flash_message', 'Anda telah memesan tempat');
        return redirect('/'.'#contact');
    }

    public function addReview(ReviewRequest $request) {
        $input = $request->all();
      /** Jalankan method create dengan indikator input pada model Siswa */
        $review = Review::create($input);
        Session::flash('flash_message', 'Anda telah memesan tempat');
        return redirect('/'.'#menu-list');
    }

   public function destroy($review) {
        $data = Review::findOrFail($review);
        $data->delete();
        return redirect('/'.'#menu-list');
   }

    private function uploadGambar(RegisterRequest $request) {
      $gambar = $request->file('gambar');
      $ext = $gambar->getClientOriginalExtension();

      if($request->file('gambar')->isValid()) {
         $gambar_name = 'UserImage-'.date('YmdHis'). '.'.$ext;
         $upload_path = 'gambarupload';
         $request->file('gambar')->move($upload_path, $gambar_name);
         
         return $gambar_name;
      }
      return false;
   }
}
