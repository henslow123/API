<?php

namespace App\Http\Controllers;

use App\http\Controllers\Controller;
use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategori = kategori::all();
        return response()->json($kategori);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'nama'=>'required',
            'content'=>'required',
        ]);
        $kategori = kategori::create($request->all());
        return response()->json($kategori);
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
        return response()->json($kategori);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // 
         $this->validate($request,[
            'nama'=>'required',
            'content'=>'required',
        ]);
        $kategori = kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->content = $request->content; 

         //response api update
         if ($kategori->save()){
            return response()->json(['msg'=>'Succesfully updated produk','data' => $kategori]);
        } else {
            return response()->json('Failed to update data');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        //
        $kategori->delete();
        return response()->json([
           "data"=>"data berhasil dihapus" 
        ]);
    }
}
