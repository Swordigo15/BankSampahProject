@extends('Dashboard.layouts.main')

@section('container')
    <div class="card mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5>Nama</h5>
                    <h5>Tabungan</h5>
                    <h5>No Telp.</h5>
                    <h5>alamat</h5>
                </div>
                <div class="col">
                    <h5>: {{ $member->name }}</h5>
                    <h5>: Rp. {{ $member->sampahs->sum(function($s) { return $s->pivot->jumlah * $s->harga; }) }}</h5>
                    <h5>: {{ $member->noTelp }}</h5>
                    <h5>: {{ $member->alamat }}</h5>
                </div>
                <div class="col">
                    @if ($member->image)
                        <img src="{{ asset($member->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                </div>
            </div>
            <table class="table table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis Sampah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="smph-list">
                    @foreach ($member->sampahs as $sm)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $sm->name }}</td>
                            <td>Rp. {{ $sm->harga }} / {{ $sm->satuan }}</td>
                            <td>{{ $sm->pivot->jumlah }} {{ $sm->satuan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
