# Controller Permissions

App\Http\Controllers\PermissionController.php
```php
<?php
namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{   

    public function Permission()
    {   
        $dev_permission = Permission::where('slug','create-tasks')->first();
                $manager_permission = Permission::where('slug', 'edit-users')->first();

                //RoleTableSeeder.php
                $dev_role = new Role();
                $dev_role->slug = 'developer';
                $dev_role->name = 'Front-end Developer';
                $dev_role->save();
                $dev_role->permissions()->attach($dev_permission);

                $manager_role = new Role();
                $manager_role->slug = 'manager';
                $manager_role->name = 'Assistant Manager';
                $manager_role->save();
                $manager_role->permissions()->attach($manager_permission);

                $dev_role = Role::where('slug','developer')->first();
                $manager_role = Role::where('slug', 'manager')->first();

                $createTasks = new Permission();
                $createTasks->slug = 'create-tasks';
                $createTasks->name = 'Create Tasks';
                $createTasks->save();
                $createTasks->roles()->attach($dev_role);

                $editUsers = new Permission();
                $editUsers->slug = 'edit-users';
                $editUsers->name = 'Edit Users';
                $editUsers->save();
                $editUsers->roles()->attach($manager_role);

                $dev_role = Role::where('slug','developer')->first();
                $manager_role = Role::where('slug', 'manager')->first();
                $dev_perm = Permission::where('slug','create-tasks')->first();
                $manager_perm = Permission::where('slug','edit-users')->first();

                $developer = new User();
                $developer->name = 'Mahedi Hasan';
                $developer->email = 'mahedi@gmail.com';
                $developer->password = bcrypt('secrettt');
                $developer->save();
                $developer->roles()->attach($dev_role);
                $developer->permissions()->attach($dev_perm);

                $manager = new User();
                $manager->name = 'Hafizul Islam';
                $manager->email = 'hafiz@gmail.com';
                $manager->password = bcrypt('secrettt');
                $manager->save();
                $manager->roles()->attach($manager_role);
                $manager->permissions()->attach($manager_perm);

                
                return redirect()->back();
    }
}
```

Agora você pode usar seu controller como abaixo para dar permissão e acesso ao usuário.
```php
public function __construct()
{
   $this->middleware('auth'); 
}


public function store(Request $request)
{
    if ($request->user()->can('create-tasks')) {
        //Code goes here
    }
}

public function destroy(Request $request, $id)
{   
    if ($request->user()->can('delete-tasks')) {
      //Code goes here
    }

}
```

Agora, apenas os usuários podem acessar esta rota cuja role/função é developer.


Via Controller Helpers

In addition to helpful methods provided to the User model, Laravel provides a helpful authorize method to any of your controllers which extend the App\Http\Controllers\Controller base class. Like the can method, this method accepts the name of the action you wish to authorize and the relevant model. If the action is not authorized, the authorize method will throw an Illuminate\Auth\Access\AuthorizationException, which the default Laravel exception handler will convert to an HTTP response with a 403 status code:
```php
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Update the given blog post.
     *
     * @param  Request  $request
     * @param  Post  $post
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        // The current user can update the blog post...
    }
}
```
Actions That Don't Require Models

As previously discussed, some actions like create may not require a model instance. In these situations, you should pass a class name to the authorize method. The class name will be used to determine which policy to use when authorizing the action:
```php
/**
 * Create a new blog post.
 *
 * @param  Request  $request
 * @return Response
 * @throws \Illuminate\Auth\Access\AuthorizationException
 */
public function create(Request $request)
{
    $this->authorize('create', Post::class);

    // The current user can create blog posts...
}
```
Authorizing Resource Controllers

If you are utilizing resource controllers, you may make use of the authorizeResource method in the controller's constructor. This method will attach the appropriate can middleware definitions to the resource controller's methods.

The authorizeResource method accepts the model's class name as its first argument, and the name of the route / request parameter that will contain the model's ID as its second argument. You should ensure your resource controller is created with the --model flag to have the required method signatures and type hints:
```php
<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }
}

The following controller methods will be mapped to their corresponding policy method:
Controller Method 	Policy Method
index 	viewAny
show 	view
create 	create
store 	create
edit 	update
update 	update
destroy 	delete
```
    You may use the make:policy command with the --model option to quickly generate a policy class for a given model: php artisan make:policy PostPolicy --model=Post.


Gates in Controller:

You can also check in Controller file as like bellow:
```php
/**
 * Create a new controller instance.
 *
 * @return void
 */
public function delete()
{
    if (Gate::allows('isAdmin')) {
        dd('Admin allowed');
    } else {
        dd('You are not Admin');
    }
}
/**
 * Create a new controller instance.
 *
 * @return void
 */
public function delete()
{
    if (Gate::denies('isAdmin')) {
        dd('You are not admin');
    } else {
        dd('Admin allowed');
    }
}
/**
 * Create a new controller instance.
 *
 * @return void
 */
public function delete()
{
    $this->authorize('isAdmin');
}
/**
 * Create a new controller instance.
 *
 * @return void
 */
public function delete()
{
    $this->authorize('isUser');
}
```
