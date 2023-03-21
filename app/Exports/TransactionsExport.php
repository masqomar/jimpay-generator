<?php

namespace App\Exports;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
// use Bavix\Wallet\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransactionsExport implements FromCollection, WithMapping
{

    // public function collection()
    // {
    //     return Transaction::with('user')->whereRelation('user', 'type', 'store')
    //         ->orderBy('created_at', 'ASC')->get();
    // }

    // public function map($transaction): array
    // {
    //     return [
    //         $transaction->id,
    //         $transaction->user->email,
    //         $transaction->user->first_name,
    //         $transaction->amount,
    //         $transaction->meta,
    //         Carbon::parse($transaction->created_at)->toFormattedDateString()
    //     ];
    // }

    // public function headings(): array
    // {
    //     return [
    //         '#',
    //         'Email',
    //         'Mitra',
    //         'Nominal',
    //         'Keterangan',
    //         'Created At'
    //     ];
    // }

    public function collection()
    {
        return Transaction::get();
    }

    public function map($transaction): array
    {
        return [
            $transaction->id,
            $transaction->user->email,
            $transaction->user->first_name,
            $transaction->amount,
            $transaction->meta,
            Carbon::parse($transaction->created_at)->toFormattedDateString()
        ];
    }
}
