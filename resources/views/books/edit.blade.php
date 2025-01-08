@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Edit Book</h1>

  <form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
      <label for="title">Title</label>
      <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $book->title) }}" required>
    </div>

    <div class="form-group mb-3">
      <label for="description">Description</label>
      <textarea id="description" name="description" class="form-control">{{ old('description', $book->description) }}</textarea>
    </div>

    <div class="form-group mb-3">
      <label for="author_id">Author</label>
      <select id="author_id" name="author_id" class="form-control" required>
        @foreach($authors as $author)
        <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group mb-3">
      <label for="publication_year">Publication Year</label>
      <input type="number" id="publication_year" name="publication_year" class="form-control" value="{{ old('publication_year', $book->publication_year) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Book</button>
  </form>
</div>
@endsection
