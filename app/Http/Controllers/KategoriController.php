<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Datatables;
use Validator;
use Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kategori.index');
    }

    public function dataKategori(Request $request) 
    {
        if($request->ajax()){
        $getKategori = Kategori::select(['idKategori', 'namaKategori']);

        return Datatables::of($getKategori)
            ->addColumn('action', function ($kategori) {
                return "<button class='edit-modal btn btn-info btn-sm btn-flat' data-id='".$kategori->idKategori."' data-name='".$kategori->namaKategori."'><i class='fa fa-edit'></i>
                </button>
                    <button class='delete-modal btn btn-danger btn-sm btn-flat' data-id='".$kategori->idKategori."' data-name='".$kategori->namaKategori."'>
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
        $input = $request->all();

        $validator = Validator::make($input, [
            'namaKategori' => 'required|string|max:25'
        ]);

        if($validator->fails()) {
            return redirect('kategori')->withInput()->withErrors($validator);
        }

        Kategori::create($input);
        Session::flash('flash_message', 'Data berhasil disimpan');
        return redirect('kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $kategori = Kategori::find ( $request->id );
        $kategori->namaKategori = $request->name;

        $kategori->save();
        Session::flash('flash_message', 'Data berhasil diupdate');
        return response ()->json ( $kategori );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Kategori::find($request->id)->delete();
        Session::flash('flash_message', 'Data berhasil dihapus');
        Session::flash('penting', 'true');
        return response ()->json ();
    }
}
