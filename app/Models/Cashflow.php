<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['saving_account_id', 'amount', 'type', 'description', 'date', 'cashflow_image'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['amount' => 'integer', 'type' => 'string', 'description' => 'string', 'date' => 'date:d/m/Y', 'cashflow_image' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    

	public function saving_account()
	{
		return $this->belongsTo(\App\Models\SavingAccount::class);
	}
}
