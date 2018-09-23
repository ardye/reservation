<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use Illuminate\Http\Request;
use App\Http\Requests\FasilitasRequest;
use App\Http\Requests;
use Datatables;
use Session;
use Storage;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.fasilitas.index');
    }

    public function dataFasilitas(Request $request) 
    {
        if($request->ajax()){
        $getFasilitas = Fasilitas::select(['idFasilitas','namaFasilitas','detailFasilitas','gambar']);

        return Datatables::of($getFasilitas)
            ->addColumn('action', function ($fasilitas) {
                return "
                <a href='fasilitas/".$fasilitas->idFasilitas."/edit'><button class='edit-modal btn btn-info btn-sm btn-flat' data-id='".$fasilitas->idFasilitas."' data-name='".$fasilitas->namaFasilitas."'><i class='fa fa-edit'></i>
                </button></a>
                    <button class='delete-modal btn btn-danger btn-sm btn-flat' data-id='".$fasilitas->idFasilitas."' data-name='".$fasilitas->namaFasilitas."'>
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
        return view('admin.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FasilitasRequest $request)
    {
        $input = $request->all();
        if($request->hasFile('gambar')) {
            $input['gambar'] = $this->uploadGambar($request);
        }
      /** Jalankan method create dengan indikator input pada model Siswa */
        $fasilitas = Fasilitas::create($input);
        Session::flash('flash_message', 'Data berhasil disimpan');
        return redirect('fasilitas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas)
    {
        return redirect('fasilitas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilitas)
    {
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(FasilitasRequest $request, Fasilitas $fasilitas)
    {
        $input = $request->all();

         if($request->hasFile('gambar')) {
            //Hapus foto lama jika ada foto baru
            $this->hapusGambar($fasilitas);

            //upload foto
            $input['gambar'] = $this->uploadGambar($request);
          }
        $fasilitas->update($input);
        Session::flash('flash_message', 'Data berhasil diupdate');
        return redirect('fasilitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Fasilitas $fasilitas)
    {
        $this->hapusGambar($fasilitas);
        Fasilitas::find($request->id)->delete();
        Session::flash('flash_message', 'Data berhasil dihapus');
        Session::flash('penting', 'true');
        return response ()->json ();
    }

    private function uploadGambar(FasilitasRequest $request) {
      $gambar = $request->file('gambar');
      $ext = $gambar->getClientOriginalExtension();

      if($request->file('gambar')->isValid()) {
         $gambar_name = 'fasilitas'.date('YmdHis'). '.'.$ext;
         $upload_path = 'gambarupload';
         $request->file('gambar')->move($upload_path, $gambar_name);
         
         return $gambar_name;
      }
      return false;
   }

    private function hapusGambar(Fasilitas $fasilitas) {
      $exist = Storage::disk('gambar')->exists($fasilitas->gambar);
         if(isset($fasilitas->gambar) && $exist) {
            $delete = Storage::disk('gambar')->delete($fasilitas->gambar);
            return true;
         }
      return false;
   }
}
