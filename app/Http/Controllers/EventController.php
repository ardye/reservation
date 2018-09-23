<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Datatables;
use Session;
use Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.event.index');
    }

    public function dataEvent(Request $request) 
    {
        if($request->ajax()){
        $getEvent = Event::select(['idEvent', 'namaEvent', 'deskEvent', 'tanggalMulai', 'tanggalSelesai', 'gambar']);

        return Datatables::of($getEvent)
            ->addColumn('action', function ($event) {
                return "<a href='event/".$event->idEvent."'><button class='btn btn-success btn-sm btn-flat'><i class='fa fa-eye'></i>
                </button></a>
                <a href='event/".$event->idEvent."/edit'><button class='edit-modal btn btn-info btn-sm btn-flat' data-id='".$event->idEvent."' data-name='".$event->namaEvent."'><i class='fa fa-edit'></i>
                </button></a>
                    <button class='delete-modal btn btn-danger btn-sm btn-flat' data-id='".$event->idEvent."' data-name='".$event->namaEvent."'>
                            <i class='fa fa-trash'></i>
                        </button>";

                    // <form style="display: inline">
                    //     <input name="_method" type="hidden" value="DELETE">
                    //     <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                    //     <button class="delete-modal btn btn-sm btn-danger btn-flat" type="button" style="border: none"><i class="fa fa-trash" aria-hidden="true" data-idKategori="{{ $kategori->idKategori }}" data-namaKategori="{{ $kategori->namaKategori }}"></i></button>
                    // </form>'; 
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
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $input = $request->all();
        if($request->hasFile('gambar')) {
            $input['gambar'] = $this->uploadGambar($request);
        }
      /** Jalankan method create dengan indikator input pada model Siswa */
        $event = Event::create($input);
        Session::flash('flash_message', 'Data berhasil disimpan');
        return redirect('event');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('admin.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $input = $request->all();
         if($request->hasFile('gambar')) {
            //Hapus foto lama jika ada foto baru
            $this->hapusGambar($event);

            //upload foto
            $input['gambar'] = $this->uploadGambar($request);
          }
        $event->update($input);
        Session::flash('flash_message', 'Data berhasil diupdate');
        return redirect('event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Event $event)
    {
        $this->hapusGambar($event);
        Event::find($request->id)->delete();
        Session::flash('flash_message', 'Data berhasil dihapus');
        Session::flash('penting', 'true');
        return response ()->json ();
    }

    private function uploadGambar(EventRequest $request) {
      $gambar = $request->file('gambar');
      $ext = $gambar->getClientOriginalExtension();

      if($request->file('gambar')->isValid()) {
         $gambar_name = date('YmdHis'). '.'.$ext;
         $upload_path = 'gambarupload';
         $request->file('gambar')->move($upload_path, $gambar_name);
         
         return $gambar_name;
      }
      return false;
   }

   private function hapusGambar(Event $event) {
      $exist = Storage::disk('gambar')->exists($event->gambar);
         if(isset($event->gambar) && $exist) {
            $delete = Storage::disk('gambar')->delete($event->gambar);
            return true;
         }
      return false;
   }
}
