<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // method untuk menampilkan halaman daftar buku
    public function index()
    {
        return view('books.index');
    }

    // method untuk membuat buku baru
    public function create()
    {
        return view('books.create');
    }

    // method untuk menyimpan buku baru
    public function store(Request $request)
    {

    }

    // method untuk menampilkan detail buku
    public function show($id)
    {
        return view('books.show', compact('id'));
    }

    // method untuk menampilkan form edit buku
    public function edit($id)
    {
        return view('books.edit', compact('id'));
    }

    // method untuk menyimpan perubahan dari form edit
    public function update(Request $request, $id)
    {
        return redirect()->route('books.show', ['id' => $id]);
    }
}