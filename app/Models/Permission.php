<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $guarded = ['id'];
    protected $fillable = array('name', 'label');
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot('role_id');;
    }
    /**
     * Determine if the permission belongs to the role.
     *
     * @param  mixed $role
     * @return boolean
     */
    public function inRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }
        return !! $role->intersect($this->roles)->count();
    }
    
}
