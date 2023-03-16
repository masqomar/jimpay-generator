@extends('layouts.app')

@section('title', __('Rekapitulasi Laba Rugi dan Neraca'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('User') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Detail user information.') }}
                </p>
            </div>

            <x-breadcrumb>
                <li class="breadcrumb-item">
                    <a href="/">{{ __('Dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('users.index') }}">{{ __('User') }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __('Detail') }}
                </li>
            </x-breadcrumb>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center fw-bold">NERACA</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Jumlah</th>
                                </tr>
                                <tr>
                                    <td class="text-center">1-1100</td>
                                    <td>Kas Tunai</td>
                                    <td style="text-align: right;">@rupiah($kasTunai)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">1-1200</td>
                                    <td>Bank</td>
                                    <td style="text-align: right;">@rupiah($bank)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">1-1300</td>
                                    <td>Piutang Dagang</td>
                                    <td style="text-align: right;">@rupiah($piutangDagang)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">1-1400</td>
                                    <td>Piutang Karyawan</td>
                                    <td style="text-align: right;">@rupiah($piutangKaryawan)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">1-1500</td>
                                    <td>Uang Muka</td>
                                    <td style="text-align: right;">@rupiah($uangMuka)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">1-1600</td>
                                    <td>Persediaan Barang Dagang</td>
                                    <td style="text-align: right;">@rupiah($persediaanBrgDagang)</td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">Total Aktiva Lancar</td>
                                    <td style="text-align: right;">@rupiah($totalAktifaLancar)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">1-2100</td>
                                    <td>Tanah</td>
                                    <td style="text-align: right;">@rupiah($tanah)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">1-2200</td>
                                    <td>Gedung</td>
                                    <td style="text-align: right;">@rupiah($gedung)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">1-2210</td>
                                    <td>Akumulasi Depresiasi Gedung</td>
                                    <td style="text-align: right;">diitung</td>
                                </tr>
                                <tr>
                                    <td class="text-center">1-2300</td>
                                    <td>Peralatan</td>
                                    <td style="text-align: right;">@rupiah($peralatan)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">1-2310</td>
                                    <td>Akumulasi Penyusutan Peralatan</td>
                                    <td style="text-align: right;">diitung</td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">Total Aktiva Tetap</td>
                                    <td style="text-align: right;">@rupiah($totalAktifaTetap)</td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">Total Aktiva</td>
                                    <td style="text-align: right;" class="bg-primary text-white fw-bold">@rupiah($totalAktifa)</td>
                                </tr>
                                <table class="table table-hover table-striped">
                                    <tr>
                                        <td class="text-center">2-1100</td>
                                        <td>Hutang Anggota</td>
                                        <td style="text-align: right;">@rupiah($hutangAnggota)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2-1110</td>
                                        <td>Tabungan Pokok</td>
                                        <td style="text-align: right;">@rupiah($tabunganPokok)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2-1120</td>
                                        <td>Tabungan Wajib</td>
                                        <td style="text-align: right;">@rupiah($tabunganWajib)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2-1130</td>
                                        <td>Tabungan Sukarela</td>
                                        <td style="text-align: right;">@rupiah($tabunganSukarela)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2-1140</td>
                                        <td>Tabungan Sihara</td>
                                        <td style="text-align: right;">@rupiah($tabunganSihara)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2-1200</td>
                                        <td>Hutang Dagang</td>
                                        <td style="text-align: right;">@rupiah($hutangDagang)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2-1300</td>
                                        <td>Hutang LC</td>
                                        <td style="text-align: right;">@rupiah($hutangLc)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2-1400</td>
                                        <td>Hutang Sewa</td>
                                        <td style="text-align: right;">@rupiah($hutangSewa)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2-1500</td>
                                        <td>Iklan dibayar dimuka</td>
                                        <td style="text-align: right;">@rupiah($iklanBayarMuka)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="2">Total Kewajiban</td>
                                        <td style="text-align: right;">@rupiah($totalKewajiban)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3-1100</td>
                                        <td>Modal</td>
                                        <td style="text-align: right;">@rupiah($modal)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3-1200</td>
                                        <td>Prive</td>
                                        <td style="text-align: right;">@rupiah($prive)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3-1300</td>
                                        <td>Laba Rugi Berjalan</td>
                                        <td style="text-align: right;">@rupiah($labaRugiBerjalan)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="2">Total Modal</td>
                                        <td style="text-align: right;">@rupiah($totalModal)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="2">Total Modal</td>
                                        <td style="text-align: right;" class="bg-primary text-white fw-bold">@rupiah($totalan)</td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center fw-bold">REKAPITULASI KAS</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Jumlah</th>
                                </tr>
                                <tr>
                                    <td>Total Aktifa</td>
                                    <td style="text-align: right;" class="bg-primary text-white fw-bold">@rupiah($totalAktifa)</td>
                                </tr>
                                <tr>
                                    <td>Total Modal</td>
                                    <td style="text-align: right;" class="bg-secondary text-white fw-bold">@rupiah($totalModal)</td>
                                </tr>
                                <tr>
                                    <td>Total Penjualan</td>
                                    <td style="text-align: right;" class="bg-danger text-white fw-bold">@rupiah($totalPenjualan)</td>
                                </tr>
                                <tr>
                                    <td>Total Pembelian</td>
                                    <td style="text-align: right;" class="bg-warning text-white fw-bold">@rupiah($totalPembelian)</td>
                                </tr>
                                <tr>
                                    <td>Total Pendapatan</td>
                                    <td style="text-align: right;" class="bg-success text-white fw-bold">@rupiah($totalPendapatan)</td>
                                </tr>
                                <tr>
                                    <td>Total Beban</td>
                                    <td style="text-align: right;" class="bg-dark text-white fw-bold">@rupiah($totalBeban)</td>
                                </tr>
                                <tr>
                                    <td>Laba Rugi</td>
                                    <td style="text-align: right;" class="bg-primary text-white fw-bold">@rupiah($labaRugi)</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center fw-bold">LABA RUGI</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Jumlah</th>
                                </tr>
                                <tr>
                                    <td class="text-center">4-1100</td>
                                    <td>Penjualan</td>
                                    <td style="text-align: right;">@rupiah($penjualan)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4-1200</td>
                                    <td>Retur Penjualan</td>
                                    <td style="text-align: right;">@rupiah($returnPenjualan)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4-1300</td>
                                    <td>Potongan Penjualan</td>
                                    <td style="text-align: right;">@rupiah($potonganPenjualan)</td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">Total Penjualan</td>
                                    <td style="text-align: right;">@rupiah($totalPenjualan)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4-2100</td>
                                    <td>Pembelian</td>
                                    <td style="text-align: right;">@rupiah($pembelian)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4-2200</td>
                                    <td>Beban Angkut Pembelian</td>
                                    <td style="text-align: right;">@rupiah($bebanAngkut)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4-2300</td>
                                    <td>Return Pembelian</td>
                                    <td style="text-align: right;">@rupiah($returnPembelian)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4-2400</td>
                                    <td>Potongan Pembelian</td>
                                    <td style="text-align: right;">@rupiah($potonganPembelian)</td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">Total Pembelian</td>
                                    <td style="text-align: right;">@rupiah($totalPembelian)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4-3000</td>
                                    <td>Pendapatan Lain-lain</td>
                                    <td style="text-align: right;">tunggu rumus</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4-3100</td>
                                    <td>Pendapatan Bunga Bank</td>
                                    <td style="text-align: right;">@rupiah($pendapatanBungaBank)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4-3200</td>
                                    <td>Laba Pinjaman</td>
                                    <td style="text-align: right;">@rupiah($labaPinjaman)</td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">Total Pendapatan</td>
                                    <td style="text-align: right;">@rupiah($totalPendapatan)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">5-2000</td>
                                    <td>Biaya Perlengkapan</td>
                                    <td style="text-align: right;">@rupiah($biayaPerlengkapan)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">5-1100</td>
                                    <td>Biaya administrasi Bank</td>
                                    <td style="text-align: right;">@rupiah($biayaAdministrasiBank)</td>
                                </tr>
                                <tr>
                                    <td class="text-center">5-1200</td>
                                    <td>Listrik, Air, dan Telepon</td>
                                    <td style="text-align: right;">@rupiah($biayaListrik)</td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">Total Beban</td>
                                    <td style="text-align: right;">@rupiah($totalBeban)</td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">Laba Rugi</td>
                                    <td style="text-align: right;">@rupiah($labaRugi)</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center fw-bold">SHU DITERIMAKAN</h4>

                        <h1 class="text-center fw-bold text-primary">1999999</h1>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
</div>
@endsection