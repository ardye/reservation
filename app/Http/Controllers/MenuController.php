<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Kategori;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use Datatables;
use Session;
use Storage;
use App\Review;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.menu.index');
    }

    public function dataMenu(Request $request) 
    {
        if($request->ajax()){
        $getMenu = Menu::select(['idMenu', 'namaMenu', 'deskMenu', 'rating', 'gambar', 'idKategori']);

        return Datatables::of($getMenu)
            ->addColumn('action', function ($menu) {
                return "<a href='menu/".$menu->idMenu."'><button class='btn btn-success btn-sm btn-flat'><i class='fa fa-eye'></i>
                </button></a>
                <a href='menu/".$menu->idMenu."/edit'><button class='edit-modal btn btn-info btn-sm btn-flat' data-id='".$menu->idMenu."' data-name='".$menu->namaMenu."'><i class='fa fa-edit'></i>
                </button></a>
                    <button class='delete-modal btn btn-danger btn-sm btn-flat' data-id='".$menu->idMenu."' data-name='".$menu->namaMenu."'>
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
        $listKategori = Kategori::pluck('namaKategori','idKategori');
        return view('admin.menu.create', compact('listKategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $input = $request->all();
        if($request->hasFile('gambar')) {
            $input['gambar'] = $this->uploadGambar($request);
        }
      /** Jalankan method create dengan indikator input pada model Siswa */
        $menu = Menu::create($input);
        Session::flash('flash_message', 'Data berhasil disimpan');
        return redirect('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        $review = Review::where('idMenu', $menu->idMenu)->get();
        return view('admin.menu.show', compact('menu', 'review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $listKategori = Kategori::pluck('namaKategori','idKategori');
        return view('admin.menu.edit', compact('menu', 'listKategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $input = $request->all();
         if($request->hasFile('gambar')) {
            //Hapus foto lama jika ada foto baru
            $this->hapusGambar($event);

            //upload foto
            $input['gambar'] = $this->uploadGambar($request);
          }
        $menu->update($input);
        Session::flash('flash_message', 'Data berhasil diupdate');
        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Menu $menu)
    {
        $this->hapusGambar($menu);
        Menu::find($request->id)->delete();
        Session::flash('flash_message', 'Data berhasil dihapus');
        Session::flash('penting', 'true');
        return response ()->json ();
    }

    public function deleteReview(Request $request)
    {
        Review::find($request->id)->delete();
        return response ()->json ();
    }

    private function uploadGambar(MenuRequest $request) {
      $gambar = $request->file('gambar');
      $ext = $gambar->getClientOriginalExtension();

      if($request->file('gambar')->isValid()) {
         $gambar_name = 'Menu'.date('YmdHis'). '.'.$ext;
         $upload_path = 'gambarupload';
         $request->file('gambar')->move($upload_path, $gambar_name);
         
         return $gambar_name;
      }
      return false;
   }

    private function hapusGambar(Menu $menu) {
      $exist = Storage::disk('gambar')->exists($menu->gambar);
         if(isset($menu->gambar) && $exist) {
            $delete = Storage::disk('gambar')->delete($menu->gambar);
            return true;
         }
      return false;
   }
}
