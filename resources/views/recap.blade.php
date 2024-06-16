@extends('layouts.main')

@section('container')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ $type === 'orang' ? 'active' : '' }}" aria-current="page" href="/recap/perorangan">Perorangan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $type === 'bulan' ? 'active' : '' }}" href="/recap/bulanan">Bulanan</a>
        </li>
    </ul>

    @if($type === 'orang')
    <table class="table table-sm table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Tabungan</th>
                <th scope="col" colspan="3">Jenis Sampah</th>
                <th scope="col"></th>
            </tr>
            <tr>
                <th scope="col" colspan="3"></th>
                <th scope="col">Sampah 1</th>
                <th scope="col">Sampah 2</th>
                <th scope="col">Sampah 3</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Annys</td>
                <td>10000</td>
                <td>5 kg</td>
                <td>5 kg</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <th scope="row" colspan="2">Total</th>
                <td>120000</td>
                <td>60 kg</td>
                <td>60 kg</td>
                <td>60 kg</td>
            </tr>
        </tbody>
    </table>
    @else
    <table class="table table-sm table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Bulan</th>
                <th scope="col">Tabungan</th>
                <th scope="col" colspan="3">Jenis Sampah</th>
                <th scope="col"></th>
            </tr>
            <tr>
                <th scope="col" colspan="3"></th>
                <th scope="col">Sampah 1</th>
                <th scope="col">Sampah 2</th>
                <th scope="col">Sampah 3</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Januari</td>
                <td>10000</td>
                <td>5 kg</td>
                <td>5 kg</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Februari</td>
                <td>10000</td>
                <td>5 kg</td>
                <td>5 kg</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Maret</td>
                <td>10000</td>
                <td>5 kg</td>
                <td>5 kg</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>April</td>
                <td>10000</td>
                <td>5 kg</td>
                <td>5 kg</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>Mei</td>
                <td>10000</td>
                <td>5 kg</td>
                <td>5 kg</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td>Juni</td>
                <td>10000</td>
                <td>5 kg</td>
                <td>5 kg</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <th scope="row">7</th>
                <td>Juli</td>
                <td>10000</td>
                <td>5 kg</td>
                <td>5 kg</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <th scope="row">8</th>
                <td>Agustus</td>
                <td>10000</td>
                <td>5 kg</td>
                <td>5 kg</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <th scope="row">9</th>
                <td>September</td>
                <td>10000</td>
                <td>5 kg</td>
                <td>5 kg</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <th scope="row">10</th>
                <td>Oktober</td>
                <td>10000</td>
                <td>5 kg</td>
                <td>5 kg</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <th scope="row">11</th>
                <td>November</td>
                <td>10000</td>
                <td>5 kg</td>
                <td>5 kg</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <th scope="row">12</th>
                <td>Desember</td>
                <td>10000</td>
                <td>5 kg</td>
                <td>5 kg</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <th scope="row" colspan="2">Total</th>
                <td>120000</td>
                <td>60 kg</td>
                <td>60 kg</td>
                <td>60 kg</td>
            </tr>
        </tbody>
    </table>
    @endif
@endsection
