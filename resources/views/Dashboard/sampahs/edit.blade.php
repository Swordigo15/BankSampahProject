@extends('Dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Jenis Sampah</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/sampahs/{{ $sampah->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                id="name" name="name" required autofocus value="{{ old('name', $sampah->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control @error('harga') is-invalid @enderror" 
                id="harga" name="harga" required value="{{ old('harga', $sampah->harga) }}">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <select class="form-select" name="satuan">
                    <option value="kg" {{ $sampah->satuan === "kg" ? 'selected' : '' }}>kilogram (kg)</option>
                    <option value="l" {{ $sampah->satuan === "l" ? 'selected' : '' }}>liter (l)</option>
                    <option value="pcs" {{ $sampah->satuan === "pcs" ? 'selected' : '' }}>pcs</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
@endsection
