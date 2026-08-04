@extends('admin.layout')

@section('title', 'Edit Artikel')

@section('content')

    <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Artikel</h1>

    <form method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.posts._form')
    </form>

@endsection