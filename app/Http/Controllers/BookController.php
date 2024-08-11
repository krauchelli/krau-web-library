<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    // method untuk menampilkan halaman daftar buku
    public function index(Request $request)
    {
        $books = Book::all();
        $categories = Category::all();
        $category_id = $request->input('category_id');

        if ($category_id) {
            $books = Book::where('category_id', $category_id)->get();
        } else {
            $books = Book::all();
        }

        return view('books.index', compact('books', 'categories', 'category_id'));
    }

    // method untuk menampilkan halaman form tambah buku
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    // method untuk menyimpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
            'isbn' => 'required|string|max:13',
            'category_id' => 'required|exists:categories,id',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book has been added');
    }

    // method untuk menampilkan detail buku
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    // method untuk menampilkan form edit buku
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    // method untuk menyimpan perubahan dari form edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
            'isbn' => 'required|string|max:13',
            'category_id' => 'required|exists:categories,id',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.show', ['id' => $id])->with('success', 'Book has been updated');
    }
}