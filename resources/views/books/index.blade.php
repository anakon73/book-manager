@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Books List</h1>
  <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>

  @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif

  @if (session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
  @endif

  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Author</th>
        <th>Publication Year</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($books as $book)
      <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author->name }}</td>
        <td>{{ $book->publication_year }}</td>
        <td>
          <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">View</a>
          <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>

          <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="d-flex justify-content-center">
    {{ $books->links() }}
  </div>
</div>
@endsection
