@extends('Dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Sampah</h1>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive small col-lg-8">
        <a href="/dashboard/sampahs/create" class="btn btn-primary mb-3">Tambah Jenis Sampah</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sampahs as $sampah)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sampah->name }}</td>
                        <td>Rp. {{ $sampah->harga }},00 / {{ $sampah->satuan }}</td>
                        <td>{{ $sampah->members->sum(function($s) { return $s->pivot->jumlah; }) }}</td>
                        <td>
                            <a href="/dashboard/sampahs/{{ $sampah->id }}/edit" class="badge bg-warning">
                                <i class="bi bi-pencil"></i></a>
                            <form action="/dashboard/sampahs/{{ $sampah->id }}" method="post" class="d-inline"> 
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection