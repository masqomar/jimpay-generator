<?php

namespace App\Imports;

use App\Models\Cashflow;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportCashflow implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Cashflow([
            'saving_account_id' => $row[0],
            'amount'            => $row[1],
            'type'              => $row[2],
            'description'       => $row[3],
            'date'              => $row[4],
        ]);
    }
}
