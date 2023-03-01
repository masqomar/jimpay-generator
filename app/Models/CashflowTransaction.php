<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashflowTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['cashflow_id', 'bank_id', 'description', 'extra_field'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['description' => 'string', 'extra_field' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    

	public function cashflow()
	{
		return $this->belongsTo(\App\Models\Cashflow::class);
	}	
	public function bank()
	{
		return $this->belongsTo(\App\Models\Bank::class);
	}
}
