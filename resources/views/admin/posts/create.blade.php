@extends('admin.layout')

@section('title', 'Artikel Baru')

@section('content')

    <h1 class="text-2xl font-bold text-gray-900 mb-6">Artikel Baru</h1>

    <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.posts._form')
    </form>

@endsection