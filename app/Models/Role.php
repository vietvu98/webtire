<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Role extends Model
{
    protected $table = 'roles';

    protected $guarded = ['id'];
    protected $fillable = array('name');

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('user_id');;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withPivot('permission_id');
    }
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
    /**
     * Determine if the user may perform the given permission.
     *
     * @param  Permission $permission
     * @return boolean
     */
    public function hasPermission(Permission $permission, User $user)
    {
        return $this->hasRole($permission->roles);
    }
    /**
     * Determine if the role has the given permission.
     *
     * @param  mixed $permission
     * @return boolean
     */
    public function inRole($permission)
    {
        if (is_string($permission)) {
            return $this->permissions->contains('name', $permission);
        }
        return !! $permission->intersect($this->permissions)->count();
    }
}
