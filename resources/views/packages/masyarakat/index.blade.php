@extends('layout.masyarakat')

@section('title')
Dashboard
@endsection
@section('content')
<main class="h-full pb-16 overflow-y-auto">
    {{--@foreach($liat as $li)
    <li>{{ $li->nik }}</li>
@endforeach --}}
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2x1 font-semibold text-gray-700 dark:text-gray-200">
    Silahkan ajukan pengaduan anda!
    </h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }} </li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('pengaduan.store')}}" method="POST" enctype="multipart/form-data">
        @call_user_func
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Laporan</span>
          <textarea
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            rows="8" type="text" placeholder="Isi laporan Anda" value="{{ old('description')}}" required
            name="description"></textarea>
            </label>
    </form>