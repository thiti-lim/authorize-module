<?php

namespace App\Models;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'module_id'];
    public $timestamps = false;
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    public function permissions(Role $role)
    {
        $role_permissions = DB::table('role_menu_permission')
            ->join('permissions', 'role_menu_permission.permission_id', '=', 'permissions.id')
            ->join('roles', 'role_menu_permission.role_id', '=', 'roles.id')
            ->join('menus', 'role_menu_permission.menu_id', '=', 'menus.id')
            ->where('menus.id', '=', $this->id)
            ->where('roles.id', '=', $role->id)
            ->select('permissions.id', 'permissions.code', 'permissions.name')
            ->get();
        return $role_permissions;
    }
}
