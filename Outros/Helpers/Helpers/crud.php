<?php
// CRUD genérico, para qualquer Model
function select($table = 'users', $id){

    $id2 = DB::table($table)->select('id')
        ->where('id', $id)
        ->first();

    if(is_null($id2)){
        echo 'Não existe um user com este id: '.$id;
    }else{
        echo 'Existe um user com este id: '.$id;
    }
}
// Exemplo de uso: return select(3,'users');

function insert($table = 'users', $fields = []){// Ex: $fields = ['name' => 'Ribamar FS', 'email' => 'ribafs@gmail.com'];

      DB::table($table)->insert(
          $fields
      );
      echo 'Registro adicionado com sucesso ';//.$fields['id'];
}
// Exemplo de uso: return insert('users', ['name' => 'Ribamar FS', 'email' => 'joao@gmail.com', 'password' => bcrypt('123456')]);

function update($table = 'users', $whereValue, $fields = []){ // Ex: 'users', ['id', 2], ['name' => 'João Brito']

    $id = DB::table($table)->select('id')->where('id', $whereValue)->first();

    if(!is_null($id)){
        $affected = DB::table($table)
              ->where('id', $whereValue)
              ->update($fields);
        echo 'Client com id: '.$whereValue. ' atualizado com sucesso';
    }else{
        echo 'Não existe client com este id: '.$whereValue;
    }
}
// Exemplos de uso: 
// return update('users', 5, ['name' => 'João Brito']);
// return update('users', 5, ['name' => 'João Brito', 'email' => 'joao@joao.org']);

function delete($table, $id){

    $id2 = DB::table($table)->select('id')->where('id', $id)->first();

    if(!is_null($id2)){
        $affected = DB::table($table)
              ->where('id', $id)
              ->delete();
        echo 'Registro com id: '.$id. ' excluído com sucesso';
    }else{
        echo 'Não existe registro com este id: '.$id;
    }
}
// Exemplo de uso: return delete('users', 5);

