<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // method untuk menampilkan halaman daftar buku
    public function index(Request $request)
    {
        $books = $this->getPaginatedBooks();
        $categories = Category::all();
        $category_id = $request->input('category_id');

        if ($category_id) {
            $books = Book::where('category_id', $category_id)->paginate(10);
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

        $book = new Book($request->all());
        $book->user_id = Auth::id();
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book has been added');
    }

    // method untuk menampilkan detail buku
    public function show($id)
    {
        $book = $this->getBookById($id);
        return view('books.show', compact('book'));
    }

    // method untuk menampilkan form edit buku
    public function edit($id)
    {
        $book = $this->getBookById($id);
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

        $book = $this->getBookById($id);
        $book->update($request->all());

        return redirect()->route('books.show', ['id' => $id])->with('success', 'Book has been updated');
    }

    // method untuk menghapus buku
    public function destroy($id)
    {
        $book = $this->getBookById($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book has been deleted');
    }

    // method untuk melakukan export
    public function exportPDF()
    {
        $books = $this->getBooks();
        $pdf = PDF::loadView('books.pdf', compact('books'));

        return $pdf->download('books.pdf');
    }

    public function exportExcel()
    {
        $books = $this->getBooks();
        return Excel::download(new BooksExport($books), 'books.xlsx');
    }

    // method untuk menampilkan form upload file
    public function uploadForm($bookId)
    {
        $book = $this->getBookById($bookId);
        return view('books.upload', compact('book'));
    }

    // method upload file image dan pdf
    public function upload(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:2048',
            'cover_image' => 'required|image|max:2048',
        ]);

        $pdfPath = $request->file('pdf')->store('pdfs');
        $imagePath = $request->file('cover_image')->store('images');

        // update path file pdf dan image ke database
        $bookId = $request->input('book_id');
        $book = $this->getBookById($bookId);
        $book->update([
            'filename' => $pdfPath,
            'cover_image' => $imagePath,
        ]);
        $book->save();

        return redirect()->route('books.show', ['id' => $bookId])->with('success', 'File has been uploaded');
    }
    
    // method untuk menampilkan image
    public function getImage($cover_image)
    {
        return response()->file(storage_path('app/images/' . $cover_image));
    }

    // method untuk menampilkan pdf
    public function getPdf($filename)
    {
        return response()->file(storage_path('app/pdfs/' . $filename));
    }


    // method untuk mendapatkan buku dengan pagination
    private function getPaginatedBooks()
    {
        if (Auth::user()->is_admin) {
            return Book::paginate(10);
        } else {
            return Book::where('user_id', Auth::id())->paginate(10);
        }
    }

    // private method untuk menampilkan buku berdasarkan user
    private function getBooks() 
    {
        if (Auth::user()->is_admin) {
            return Book::all();
        } else {
            return Book::where('user_id', Auth::id())->get();
        }
    }

    private function getBookById($id)
    {
        if (Auth::user()->is_admin) {
            return Book::findOrFail($id);
        } else {
            return Book::where('user_id', Auth::id())->findOrFail($id);
        }
    }
}