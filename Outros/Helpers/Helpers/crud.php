<?php

/**
 * select
 * Consultar o banco de dados e retorna o registro de acordo com o id recebido
 * usage: return select( 3,'users' );
 * @param  mixed $table
 * @param  mixed $id
 * @return void
 */
function select( $table = 'users', $id ): void
{
    $exists = DB::table( $table )->select( 'id' )
        ->where( 'id', $id )
        ->first();

    if ( $exists ) {
        echo "Existe um registro com o id: {$id}";
        return;
    }

    echo "Não existe um registro com o id: {$id}";
}

/**
 * insert
 * Inserir novo registro na tabela
 * usage: return insert( 'users', [ 'name' => 'Ribamar FS', 'email' => 'joao@gmail.com', 'password' => bcrypt('123456')]);
 * @param  mixed $table
 * @param  array $fields
 * @return void
 */
function insert( $table = 'users', $fields = [] )
{
    DB::table( $table )->insert(
        $fields
    );
    echo 'Registro adicionado com sucesso ';
}

/**
 * update
 * Atualizar registro na tabela
 * usage: return update( 'users', 5, [ 'name' => 'João Brito' ]);
 * @param  mixed $table
 * @param  mixed $whereValue
 * @param  array $fields
 * @return void
 */
function update( $table = 'users', $whereValue, $fields = [] )
{
    $exists = DB::table( $table )->select( 'id' )->where( 'id' , $whereValue )->first();

    if ( !is_null( $exists ) ) {
        $affected = DB::table( $table )
              ->where( 'id', $whereValue )
              ->update( $fields );
        echo "Client com id: {$whereValue} atualizado com sucesso";
    }else{
        echo "Não existe client com este id: {$whereValue}";
    }
}

/**
 * delete
 * Excluir registro da tabela
 * usage: return delete('users', 5);
 * @param  mixed $table
 * @param  mixed $id
 * @return void
 */
function delete( $table, $id )
{
    $exists = DB::table( $table )->select( 'id' )->where( 'id', $id )->first();

    if ( !is_null( $exists ) ) {
        $affected = DB::table( $table )
              ->where( 'id', $id )
              ->delete();
        echo "Registro com id: {$id} excluído com sucesso";
    }else{
        echo "Não existe registro com este id: {$id}";
    }
}

