# Adicionar campo com migration

In this step, we will create new migration for adding new column for "role". we will take enum datatype for role column. we will take only "user", "manager" and "admin" value on that. we will keep "user" as default value. 

so let's create as like bellow:
```php
php artisan make:migration add_role_column_to_users_table

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role',  ['user', 'manager', 'admin'])->default('user');
        });
    }
```

