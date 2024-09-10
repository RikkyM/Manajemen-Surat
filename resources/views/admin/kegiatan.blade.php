@extends('app')
@section('title')
    Kegiatan
@endsection
@section('pages')
    <main class="flex h-screen overflow-y-auto bg-gray-100">
        @include('component.admin.sidebar')
        <div class="h-full flex-1 overflow-y-auto pt-8">
            <div class="grid gap-2">
                <h2 class="text-2xl font-semibold">Data User</h2>
                <span><a href="{{ route('admin.dashboard') }}">Dashboard</a> > <span
                        class="font-semibold">Kegiatan</span></span>
            </div>
            <div class="h-[calc(100%_-_64px)] w-full overflow-y-auto p-3">
                <form action="{{ route('admin.admin-kegiatan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" multiple name="gambar[]">
                    <button>Submit</button>
                </form>
                <div id="listGambar" class="columns-3">
                    @if ($kegiatan->count() > 0)
                        @foreach ($kegiatan as $item)
                            <img src="{{ asset('kegiatan/'.$item->gambar) }}" alt="kegiatan" class="max-h-[300px] mx-auto p-3">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
