<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paylater extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['user_id', 'paylater_provider_id', 'bank_id', 'bank_account_number', 'bank_account_name', 'start_date', 'finish_date', 'status', 'amount', 'duration', 'note', 'image', 'product', 'product_specification', 'extra_field'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['bank_account_number' => 'integer', 'bank_account_name' => 'string', 'start_date' => 'date:d/m/Y', 'finish_date' => 'date:d/m/Y', 'status' => 'boolean', 'amount' => 'integer', 'duration' => 'integer', 'note' => 'string', 'image' => 'string', 'product' => 'string', 'product_specification' => 'string', 'extra_field' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}	
	public function paylater_provider()
	{
		return $this->belongsTo(\App\Models\PaylaterProvider::class);
	}	
	public function bank()
	{
		return $this->belongsTo(\App\Models\Bank::class);
	}
}
