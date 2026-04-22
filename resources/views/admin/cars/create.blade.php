@extends('layouts.dashboard')

@section('content')
<div class="admin-container">
    <h2 class="admin-title">Tambah Mobil Baru</h2>

    @if($errors->any())
        <div class="alert alert-error mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf
        @include('admin.cars.partials.form', ['car' => null])
        <button class="btn btn-create w-full" type="submit">Simpan Mobil</button>
    </form>
</div>
@endsection
