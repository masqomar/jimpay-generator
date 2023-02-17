<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deviden extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['operational_reserve', 'capital', 'user_capital', 'user_activity', 'management'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['operational_reserve' => 'integer', 'capital' => 'integer', 'user_capital' => 'integer', 'user_activity' => 'integer', 'management' => 'integer', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    

}
