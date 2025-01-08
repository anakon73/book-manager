<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;

class BookController extends Controller
{
    protected $authors;

    public function __construct()
    {
        $this->authors = Author::all();
    }

    public function index()
    {
        $books = Book::with('author')->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create', ['authors' => $this->authors]);
    }

    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book, 'authors' => $this->authors]);
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $validated = $request->validated();

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $deleted = $book->delete();

        return redirect()->route('books.index')->with(
            $deleted ? 'success' : 'error',
            $deleted ? 'Book deleted successfully.' : 'Failed to delete book.'
        );
    }
}
