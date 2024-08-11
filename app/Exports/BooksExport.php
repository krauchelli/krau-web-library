<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BooksExport implements FromCollection, WithHeadings
{
    protected $books;

    public function __construct($books)
    {
        $this->books = $books;
    }

    public function collection()
    {
        return collect($this->books);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Author',
            'Published Date',
            'ISBN',
            'Category ID',
            // Add other relevant headings
        ];
    }
}