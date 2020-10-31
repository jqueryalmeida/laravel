<?php
namespace App\Permissions;

use App\Models\Permission;
use App\Models\Group;

trait HasPermissionsTrait {

   public function givePermissionsTo(... $permissions) {

    $permissions = $this->getAllPermissions($permissions);
    if($permissions === null) {
      return $this;
    }
    $this->permissions()->saveMany($permissions);
    return $this;
  }

  public function withdrawPermissionsTo( ... $permissions ) {

    $permissions = $this->getAllPermissions($permissions);
    $this->permissions()->detach($permissions);
    return $this;

  }

  public function refreshPermissions( ... $permissions ) {

    $this->permissions()->detach();
    return $this->givePermissionsTo($permissions);
  }

  public function groups() {
    return $this->belongsToMany(Group::class,'users_groups');
  }

  public function permissions() {
    return $this->belongsToMany(Permission::class,'users_permissions');
  }

  public function hasPermissionTo($permission) {
    return $this->hasPermissionThroughGroup($permission) || $this->hasPermission($permission);
  }
/*
  public function hasPermissionThroughGroup($permission) {
  //$groups = $this->groups->all();
$groups = $this->groups()->get();
    foreach ($groups as $group){
//dd($group);
      if($this->groups()->contains($group)) {
        return true;
      }
    }
    return false;
  }
*/
  public function hasPermissionThroughGroup($permission) {

    foreach ($permission->groups as $group){
      if($this->groups->contains($group)) {
        return true;
      }
    }
    return false;
  }

  public function hasGroup( ... $groups ) {

    foreach ($groups as $group) {
      if ($this->groups->contains('slug', $group)) {
        return true;
      }
    }
    return false;
  }

  protected function hasPermission($permission) {

    return (bool) $this->permissions->where('slug', $permission->slug)->count();
  }

  protected function getAllPermissions(array $permissions) {

    return Permission::whereIn('slug',$permissions)->get();
    
  }

}
