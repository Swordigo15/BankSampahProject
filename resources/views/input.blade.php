@extends('layouts.main')

@section('container')
    <h1 class="mb-5 text-center">{{ $title }}</h1>

    <div class="flex">
        <form action="/input" method="post">
            @csrf
            <select class="form-select" name="member" id="member">
                <option selected>Pilih nama...</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
    
            <div class="input-group mt-3 mb-3">
                <select class="form-select" name="jenisSampah">
                    <option selected>Pilih jenis sampah...</option>
                    @foreach ($sampahs as $sampah)
                        <option value="{{ $sampah->id }}">{{ $sampah->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="text" name="jumlah" class="form-control" placeholder="Jumlah">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pemilik</th>
                    <th scope="col">Total Tabungan</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->name }}</td>
                            <td>
                                Rp. {{ $member->sampahs->sum(function($s) { return $s->pivot->jumlah * $s->harga; }) }}
                            </td>
                        </tr>
                    @endforeach
                </tr>
            </tbody>
        </table>
        
        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pemilik</th>
                    <th scope="col">Jenis Sampah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody id="smph-list">
                @foreach ($members as $member)    
                    @foreach ($member->sampahs as $sm)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $member->name }}</td>
                            <td>{{ $sm->name }}</td>
                            <td>Rp. {{ $sm->harga }} / {{ $sm->satuan }}</td>
                            <td>{{ $sm->pivot->jumlah }} {{ $sm->satuan }}</td>
                            <td>
                                <form action="/input/1/{{ $sm->id }}" method="post" class="d-inline"> 
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
