php artisan make:model Permission -m
php artisan make:model Role -m

Relacionamentos

App/Role.php
public function permissions() {

   return $this->belongsToMany(Permission::class,'roles_permissions');
       
}

public function users() {

   return $this->belongsToMany(User::class,'users_roles');
       
}

App/Permission.php
public function roles() {

   return $this->belongsToMany(Role::class,'roles_permissions');
       
}

public function users() {

   return $this->belongsToMany(User::class,'users_permissions');
       
}

app/User.php
namespace App;

use App\Permissions\HasPermissionsTrait;

class User extends Authenticatable
{
    use HasPermissionsTrait; //Import The Trait
}

