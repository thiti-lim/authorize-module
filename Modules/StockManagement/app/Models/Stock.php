<?php

namespace Modules\StockManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\StockManagement\Database\Factories\StockFactory;

class Stock extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['code', 'name'];

    protected static function newFactory(): StockFactory
    {
        return StockFactory::new();
    }
}
