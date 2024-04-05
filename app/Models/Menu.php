<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'module_id'];
    public $timestamps = false;
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
