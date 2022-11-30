<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengembalikan view ke halaman index dengan membawa data kategori
        $data = Buku::all();
        // mengembalikan view ke halaman buku
        return view('buku.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengembalikan view ke halaman create
        $data = Kategori::all();
        // mengembalikan view ke halaman tambah buku
        return view('buku.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambahkan data dalam dorm ke dalam database
        // dd($request);
        $data = $request->all();
        $data['cover'] = Storage::put('buku/cover',  $request->file('cover'));
        Buku::create($data);
        // mengembalikan view ke halaman buku
        return redirect('buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        //mengembalikan view ke halaman edit
        $data = Kategori::all();
        // mengembalikan view ke halaman edit buku
        return view('buku.edit', compact('buku', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        // mengubah data didalam database dengan data dalam form
        $data = $request->all();

        try {
            $data['cover'] = Storage::put('buku/cover',  $request->cover);
            $buku->update($data);
        } catch (\Throwable $th) {
            $data['cover'] = $buku->cover;
            $buku->update($data);
        }
        // mengembalikan view ke halaman buku
        return redirect('buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        // menghapus data di database berdasarkan id yang dipilih di tabel
        $buku->delete();
        // mengembalikan view ke halaman buku
        return redirect('buku');
    }
    public function blog()
    {
        // mengambil data di database berdasarkan status yang aktif
        $data = Buku::where('status','aktif')->get();
        // mengembalikan view ke halaman blog
        return view('blog', compact('data'));
    }
}
