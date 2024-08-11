<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // get section
    // method untuk menampilkan halaman seluruh daftar kategori
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    // method untuk menampilkan halaman form tambah kategori
    public function create()
    {
        return view('categories.create');
    }
    // method untuk menampilkan halaman form edit kategori
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // post section
    // method untuk menyimpan data kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // put section
    // method untuk mengupdate data kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // delete section
    // method untuk menghapus data kategori
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}