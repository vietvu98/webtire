<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionRolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        $permission = Permission::where('name', 'list_permission')->first();
        return $user->hasRole($permission->roles);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PermissionRole  $permissionRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PermissionRole $permissionRole)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PermissionRole  $permissionRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PermissionRole $permissionRole)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PermissionRole  $permissionRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PermissionRole $permissionRole)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PermissionRole  $permissionRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PermissionRole $permissionRole)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PermissionRole  $permissionRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PermissionRole $permissionRole)
    {
        //
    }
}
