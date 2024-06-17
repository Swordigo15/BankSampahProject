@extends('Dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Member</h1>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive small col-lg-8">
        <a href="/dashboard/members/create" class="btn btn-primary mb-3">Tambah Member</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tabungan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $member->name }}</td>
                        <td>Rp. {{ $member->sampahs->sum(function($s) { return $s->pivot->jumlah * $s->harga; }) }},00</td>
                        <td>
                            <a href="/dashboard/members/{{ $member->id }}" class="badge bg-info">
                                <i class="bi bi-eye"></i></a>
                            <a href="/dashboard/members/{{ $member->id }}/edit" class="badge bg-warning">
                                <i class="bi bi-pencil"></i></a>
                            <form action="/dashboard/members/{{ $member->id }}" method="post" class="d-inline"> 
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