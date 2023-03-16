<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use App\Models\SavingAccount;
use App\Models\SavingAccountType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NeracaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:deviden view')->only('index');
    }

    public function index()
    {
        $kasTunaiDebit = Cashflow::where('saving_account_id', 1)->where('type', 'masuk')->sum('amount');
        $kasTunaiKredit = Cashflow::where('saving_account_id', 1)->where('type', 'keluar')->sum('amount');
        $kasTunai = $kasTunaiKredit - $kasTunaiDebit;

        $bankDebit = Cashflow::where('type', 'masuk')->sum('amount');
        $bankKredit = Cashflow::where('type', 'keluar')->sum('amount');
        $bank = $bankDebit - $bankKredit;

        $utangDagangDebit = Cashflow::where('saving_account_id', 3)->where('type', 'masuk')->sum('amount');
        $utangDagangKredit = Cashflow::where('saving_account_id', 3)->where('type', 'keluar')->sum('amount');
        $piutangDagang = $utangDagangKredit - $utangDagangDebit;

        $utangKaryawanDebit = Cashflow::where('saving_account_id', 4)->where('type', 'masuk')->sum('amount');
        $utangKaryawanKredit = Cashflow::where('saving_account_id', 4)->where('type', 'keluar')->sum('amount');
        $piutangKaryawan = $utangKaryawanDebit - $utangKaryawanKredit;

        $uangMukaDebit = Cashflow::where('saving_account_id', 5)->where('type', 'masuk')->sum('amount');
        $uangMukaKredit = Cashflow::where('saving_account_id', 5)->where('type', 'keluar')->sum('amount');
        $uangMuka = $uangMukaKredit - $uangMukaDebit;

        $persediaanBrgDagangDebit = Cashflow::where('saving_account_id', 6)->where('type', 'masuk')->sum('amount');
        $persediaanBrgDagangKredit = Cashflow::where('saving_account_id', 6)->where('type', 'keluar')->sum('amount');
        $persediaanBrgDagang = $persediaanBrgDagangKredit - $persediaanBrgDagangDebit;

        $totalAktifaLancar = $kasTunai + $bank + $piutangDagang + $piutangKaryawan + $uangMuka + $persediaanBrgDagang;

        //Aktifa Tetap
        $tanahDebit = Cashflow::where('saving_account_id', 7)->where('type', 'masuk')->sum('amount');
        $tanahKredit = Cashflow::where('saving_account_id', 7)->where('type', 'keluar')->sum('amount');
        $tanah = $tanahKredit - $tanahDebit;

        $gedungDebit = Cashflow::where('saving_account_id', 8)->where('type', 'masuk')->sum('amount');
        $gedungKredit = Cashflow::where('saving_account_id', 8)->where('type', 'keluar')->sum('amount');
        $gedung = $gedungKredit - $gedungDebit;

        $akumDepresiGedung = 0;

        $peralatanDebit = Cashflow::where('saving_account_id', 10)->where('type', 'masuk')->sum('amount');
        $peralatanKredit = Cashflow::where('saving_account_id', 10)->where('type', 'keluar')->sum('amount');
        $peralatan = $peralatanKredit - $peralatanDebit;

        $akumPenyusutanAlat = 0;

        $totalAktifaTetap = $tanah + $gedung + $akumDepresiGedung + $peralatan + $akumPenyusutanAlat;

        $totalAktifa = $totalAktifaLancar + $totalAktifaTetap;

        // Kewajiban
        $hutangAnggotaDebit = Cashflow::where('saving_account_id', 12)->where('type', 'masuk')->sum('amount');
        $hutangAnggotaKredit = Cashflow::where('saving_account_id', 12)->where('type', 'keluar')->sum('amount');
        $hutangAnggota = $hutangAnggotaKredit - $hutangAnggotaDebit;

        $tabunganPokokDebit = Cashflow::where('saving_account_id', 13)->where('type', 'masuk')->sum('amount');
        $tabunganPokokKredit = Cashflow::where('saving_account_id', 13)->where('type', 'keluar')->sum('amount');
        $tabunganPokok = $tabunganPokokDebit - $tabunganPokokKredit;

        $tabunganWajibDebit = Cashflow::where('saving_account_id', 14)->where('type', 'masuk')->sum('amount');
        $tabunganWajibKredit = Cashflow::where('saving_account_id', 14)->where('type', 'keluar')->sum('amount');
        $tabunganWajib = $tabunganWajibDebit - $tabunganWajibKredit;

        $tabunganSukarelaDebit = Cashflow::where('saving_account_id', 15)->where('type', 'masuk')->sum('amount');
        $tabunganSukarelaKredit = Cashflow::where('saving_account_id', 15)->where('type', 'keluar')->sum('amount');
        $tabunganSukarela = $tabunganSukarelaDebit - $tabunganSukarelaKredit;

        $tabunganSiharaDebit = Cashflow::where('saving_account_id', 16)->where('type', 'masuk')->sum('amount');
        $tabunganSiharaKredit = Cashflow::where('saving_account_id', 16)->where('type', 'keluar')->sum('amount');
        $tabunganSihara = $tabunganSiharaDebit - $tabunganSiharaKredit;

        $hutangDagangDebit = Cashflow::where('saving_account_id', 17)->where('type', 'masuk')->sum('amount');
        $hutangDagangKredit = Cashflow::where('saving_account_id', 17)->where('type', 'keluar')->sum('amount');
        $hutangDagang = $hutangDagangKredit - $hutangDagangDebit;

        $hutangLcDebit = Cashflow::where('saving_account_id', 18)->where('type', 'masuk')->sum('amount');
        $hutangLcKredit = Cashflow::where('saving_account_id', 18)->where('type', 'keluar')->sum('amount');
        $hutangLc = $hutangLcKredit - $hutangLcDebit;

        $hutangSewaDebit = Cashflow::where('saving_account_id', 19)->where('type', 'masuk')->sum('amount');
        $hutangSewaKredit = Cashflow::where('saving_account_id', 19)->where('type', 'keluar')->sum('amount');
        $hutangSewa = $hutangSewaKredit - $hutangSewaDebit;

        $iklanBayarMukaDebit = Cashflow::where('saving_account_id', 20)->where('type', 'masuk')->sum('amount');
        $iklanBayarMukaKredit = Cashflow::where('saving_account_id', 20)->where('type', 'keluar')->sum('amount');
        $iklanBayarMuka = $iklanBayarMukaKredit - $iklanBayarMukaDebit;

        $totalKewajiban = $hutangAnggota + $tabunganPokok + $tabunganWajib + $tabunganSukarela + $tabunganSihara + $hutangDagang + $hutangLc + $hutangSewa + $iklanBayarMuka;

        $modalDebit = Cashflow::where('saving_account_id', 21)->where('type', 'masuk')->sum('amount');
        $modalKredit = Cashflow::where('saving_account_id', 21)->where('type', 'keluar')->sum('amount');
        $modal = $modalDebit - $modalKredit;

        $priveDebit = Cashflow::where('saving_account_id', 22)->where('type', 'masuk')->sum('amount');
        $priveKredit = Cashflow::where('saving_account_id', 22)->where('type', 'keluar')->sum('amount');
        $prive = $priveKredit - $priveDebit;

        // Laba Rugi
        $penjualanDebit = Cashflow::where('saving_account_id', 24)->where('type', 'masuk')->sum('amount');
        $penjualanKredit = Cashflow::where('saving_account_id', 24)->where('type', 'keluar')->sum('amount');
        $penjualan = $penjualanDebit - $penjualanKredit;

        $returnPenjualanDebit = Cashflow::where('saving_account_id', 25)->where('type', 'masuk')->sum('amount');
        $returnPenjualanKredit = Cashflow::where('saving_account_id', 25)->where('type', 'keluar')->sum('amount');
        $returnPenjualan = $returnPenjualanKredit - $returnPenjualanDebit;

        $potonganPenjualanDebit = Cashflow::where('saving_account_id', 26)->where('type', 'masuk')->sum('amount');
        $potonganPenjualanKredit = Cashflow::where('saving_account_id', 26)->where('type', 'keluar')->sum('amount');
        $potonganPenjualan = $potonganPenjualanKredit - $potonganPenjualanDebit;

        $totalPenjualan = $penjualan - $returnPenjualan - $potonganPenjualan;

        $pembelianDebit = Cashflow::where('saving_account_id', 27)->where('type', 'masuk')->sum('amount');
        $pembelianKredit = Cashflow::where('saving_account_id', 27)->where('type', 'keluar')->sum('amount');
        $pembelian = $pembelianKredit - $pembelianDebit;

        $bebanAngkutDebit = Cashflow::where('saving_account_id', 28)->where('type', 'masuk')->sum('amount');
        $bebanAngkutKredit = Cashflow::where('saving_account_id', 28)->where('type', 'keluar')->sum('amount');
        $bebanAngkut = $bebanAngkutKredit - $bebanAngkutDebit;

        $returnPembelianDebit = Cashflow::where('saving_account_id', 29)->where('type', 'masuk')->sum('amount');
        $returnPembelianKredit = Cashflow::where('saving_account_id', 29)->where('type', 'keluar')->sum('amount');
        $returnPembelian = $returnPembelianKredit - $returnPembelianDebit;

        $potonganPembelianDebit = Cashflow::where('saving_account_id', 30)->where('type', 'masuk')->sum('amount');
        $potonganPembelianKredit = Cashflow::where('saving_account_id', 30)->where('type', 'keluar')->sum('amount');
        $potonganPembelian = $potonganPembelianKredit - $potonganPembelianDebit;

        $totalPembelian = $pembelian - $bebanAngkut + $returnPembelian - $potonganPembelian;

        // Pendapatan Lain-lain
        $pendapatanBungaBankDebit = Cashflow::where('saving_account_id', 31)->where('type', 'masuk')->sum('amount');
        $pendapatanBungaBankKredit = Cashflow::where('saving_account_id', 31)->where('type', 'keluar')->sum('amount');
        $pendapatanBungaBank = $pendapatanBungaBankDebit - $pendapatanBungaBankKredit;

        $labaPinjaman = 0;

        $totalPendapatan = $penjualan - $pembelian + $pendapatanBungaBank + $labaPinjaman;

        // Beban
        $biayaPerlengkapanDebit = Cashflow::where('saving_account_id', 34)->where('type', 'masuk')->sum('amount');
        $biayaPerlengkapanKredit = Cashflow::where('saving_account_id', 34)->where('type', 'keluar')->sum('amount');
        $biayaPerlengkapan = $biayaPerlengkapanKredit - $biayaPerlengkapanDebit;

        $biayaAdministrasiBankDebit = Cashflow::where('saving_account_id', 35)->where('type', 'masuk')->sum('amount');
        $biayaAdministrasiBankKredit = Cashflow::where('saving_account_id', 35)->where('type', 'keluar')->sum('amount');
        $biayaAdministrasiBank = $biayaAdministrasiBankKredit - $biayaAdministrasiBankDebit;

        $biayaListrikDebit = Cashflow::where('saving_account_id', 36)->where('type', 'masuk')->sum('amount');
        $biayaListrikKredit = Cashflow::where('saving_account_id', 36)->where('type', 'keluar')->sum('amount');
        $biayaListrik = $biayaListrikKredit - $biayaListrikDebit;

        $totalBeban = $biayaPerlengkapan + $biayaAdministrasiBank + $biayaListrik;

        $labaRugi = $totalPendapatan - $totalBeban;

        $labaRugiBerjalan = $labaRugi;

        $totalModal = $modal + $prive + $labaRugiBerjalan;

        $totalan = $totalKewajiban + $totalModal;

        return view('neraca.index', compact(
            'kasTunai',
            'bank',
            'piutangDagang',
            'piutangKaryawan',
            'uangMuka',
            'persediaanBrgDagang',
            'totalAktifaLancar',
            'tanah',
            'gedung',
            'peralatan',
            'totalAktifaTetap',
            'totalAktifa',
            'hutangAnggota',
            'tabunganPokok',
            'tabunganWajib',
            'tabunganSukarela',
            'tabunganSihara',
            'hutangDagang',
            'hutangLc',
            'hutangSewa',
            'iklanBayarMuka',
            'totalKewajiban',
            'modal',
            'prive',
            'labaRugiBerjalan',
            'totalModal',
            'totalan',
            'penjualan',
            'returnPenjualan',
            'potonganPenjualan',
            'totalPenjualan',
            'pembelian',
            'bebanAngkut',
            'returnPembelian',
            'potonganPembelian',
            'totalPembelian',
            'pendapatanBungaBank',
            'labaPinjaman',
            'totalPendapatan',
            'biayaPerlengkapan',
            'biayaAdministrasiBank',
            'biayaListrik',
            'totalBeban',
            'labaRugi'
        ));
    }
}
