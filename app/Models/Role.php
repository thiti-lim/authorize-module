<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class);
    }
    public function addPermissions(Menu $menu, Permission $permission)
    {
        DB::table('role_menu_permission')->insert(['permission_id' => $permission->id, 'menu_id' => $menu->id, 'role_id' => $this->id]);
    }

}
