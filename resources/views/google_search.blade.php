<!-- resources/views/google_search.blade.php -->
@extends("layouts.master")

@section("title","Google Search")

@section("content")
<h1>Google Search</h1>
<form action="{{ route('google.search') }}" method="post">
    @csrf
    <label for="query">Search Query:</label>
    <input type="text" name="query" id="query" required>
    <button type="submit">Search</button>
</form>
@endsection
