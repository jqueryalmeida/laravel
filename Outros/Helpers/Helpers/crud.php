<?php

use DB;

function qryUser($email){
    $user = new App\Models\User(); // Para versões anteriores a 8 do laravel, geralmente remover Models\

    $emaile = $user::where('email', $email)->first();

    if(is_null($emaile)){
        echo 'Não existe um user com este e-mail: '.$email;
    }else{
        echo 'Já existe um user com este e-mail: '.$email;
    }
}
// Exemplo de uso: return qryUser('joao@gmail.com');

function addUser($name, $email, $pass){
    $user = new App\Models\User(); // Para versões anteriores a 8 do laravel, geralmente remover Models\

    $em = $user::where('email', $email)->first();

    if(is_null($em)){
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($pass);
        $user->save();
        echo 'User com email: '.$email. ' adicionado com sucesso';
    }else{
        echo 'Já existe um user com este e-mail: '.$email;
    }
}
// Exemplo de uso: // return addUser('João Ribeiro2','joao@gmail.com','123456');

function updUser($name, $email, $pass){
    if(!is_null($email)){
        $affected = DB::table('users')
              ->where('email', $email)
              ->update(['name' => $name, 'email' => $email, 'password' => bcrypt($pass)]);
        echo 'User com email: '.$email. ' atualizado com sucesso';
    }else{
        echo 'Não existe um user com este e-mail: '.$email;
    }
}
// Exemplo de uso: // return updUser('João Ribeiro44','joao@gmail.com','123456');

function delUser($email){
    if(!is_null($email)){
        $affected = DB::table('users')
              ->where('email', $email)
              ->delete();
        echo 'User com email: '.$email. ' excluído com sucesso';
    }else{
        echo 'Não existe um user com este e-mail: '.$email;
    }
}
// Exemplo de uso: return delUser('joao@gmail.com');

