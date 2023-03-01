<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaylaterTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['paylater_id', 'amount', 'note', 'date'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['amount' => 'integer', 'note' => 'string', 'date' => 'date:d/m/Y', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];



    public function paylater()
    {
        return $this->belongsTo(\App\Models\Paylater::class);
    }
}
