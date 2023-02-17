@extends('layouts.app')

@section('title', __('Pembagian SHU'))

@section('content')
<h3 class="text-center"><strong>Rincian Pembagian SHU</strong></h3>
<h5><strong>Rincian Anggota</strong></h5>
<table class="table mb-0">
    <tbody>
        <tr>
            <th scope="col">Total Anggota</th>
            <td>
                <h4 class="text-info"> {{ $totalAnggota }} Orang</h4>
            </td>
        </tr>
        <tr>
            <th scope="col">Total Anggota Aktif</th>
            <td>
                <h4 class="text-warning"> {{ $totalAnggotaAktif }}</h4>
            </td>
        </tr>
        <tr>
            <th scope="col">Total Anggota Tidak Aktif</th>
            <td>
                <h4 class="text-danger"> {{ $totalAnggotaNonAktif }}</h4>
            </td>
        </tr>
    </tbody>
</table>
<hr>

<h5><strong>Rincian Simpanan Anggota</strong></h5>
<table class="table mb-0">
    <tbody>
        <tr>
            <th scope="col">Total Simpanan Pokok</th>
            <td>
                <h4 class="text-warning"> @rupiah ($simpananPokok)</h4>
            </td>
        </tr>
        <tr>
            <th scope="col">Total Simpanan Wajib</th>
            <td>
                <h4 class="text-warning"> @rupiah ($simpananWajib)</h4>
            </td>
        </tr>
        <tr>
            <th scope="col">Total Simpanan Sukarela</th>
            <td>
                <h4 class="text-warning"> @rupiah ($simpananSukarela)</h4>
            </td>
        </tr>
        <tr>
            <th scope="col">Total Simpanan Anggota</th>
            <td>
                <h4 class="text-danger">@rupiah ($totalSimpananAnggota)</h4>
            </td>
        </tr>
    </tbody>
</table>
<hr>

<h5><strong>Rincian Arus Kas</strong></h5>
<table class="table mb-0">
    <tbody>
        <tr>
            <th scope="col">Kas Masuk</th>
            <td>
                <h4 class="text-warning"> @rupiah ($kasMasuk)</h4>
            </td>
        </tr>
        <tr>
            <th scope="col">Kas Keluar</th>
            <td>
                <h4 class="text-warning"> @rupiah ($kasKeluar)</h4>
            </td>
        </tr>
        <tr>
            <th scope="col">Saldo Kas</th>
            <td>
                <h4 class="text-warning"> @rupiah ($sisaKas)</h4>
            </td>
        </tr>
    </tbody>
</table>
<br>
<br>
<br>
@endsection