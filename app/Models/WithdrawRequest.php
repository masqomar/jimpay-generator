<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['amount', 'user_id', 'bank_id', 'bank_account_number', 'bank_account_name', 'image', 'extra_field'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['bank_id' => 'integer', 'bank_account_name' => 'string', 'image' => 'string', 'extra_field' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];



    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function bank()
    {
        return $this->belongsTo(\App\Models\Bank::class);
    }
}
