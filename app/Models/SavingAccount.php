<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingAccount extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['saving_account_type_id', 'code', 'name'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['code' => 'string', 'name' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    

	public function saving_account_type()
	{
		return $this->belongsTo(\App\Models\SavingAccountType::class);
	}
}
