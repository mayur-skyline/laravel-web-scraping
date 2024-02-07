<!-- resources/views/google_results.blade.php -->
@extends("layouts.master")

@section("title","Google Search Results")

@section("content")
<h1>Google Search Results</h1>
<ul>
    @foreach ($top10Urls as $url)
    <li>{{ $url }}</li>
    @endforeach
</ul>
<a href="/">Back</a>
@endsection
