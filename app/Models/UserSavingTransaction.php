<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSavingTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['user_id', 'kop_product_id', 'amount', 'transaction_date', 'description', 'saving_transaction_image', 'status'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['amount' => 'integer', 'transaction_date' => 'date:d/m/Y', 'description' => 'string', 'saving_transaction_image' => 'string', 'status' => 'boolean', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}	
	public function kop_product()
	{
		return $this->belongsTo(\App\Models\KopProduct::class);
	}
}
