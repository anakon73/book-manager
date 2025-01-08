@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $book->title }}</h1>
  <p><strong>Author:</strong> {{ $book->author->name }}</p>
  <p><strong>Publication Year:</strong> {{ $book->publication_year }}</p>
  @if ($book->description)
  <p><strong>Description:</strong> {{ $book->description }}</p>
  @endif
  <a href="{{ route('books.index') }}" class="btn btn-primary">Back to Books List</a>
</div>
@endsection
