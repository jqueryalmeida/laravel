<?php

/**
 * select
 * Consultar o banco de dados e retorna o registro de acordo com o id recebido
 * usage: return select( 3,'users' );
 * @param  mixed $table
 * @param  mixed $id
 * @return void
 */
function select( $table = 'users', $id ): string
{
    try {
        $exists = DB::table( $table )->select( 'id' )->where( 'id' , $id )->first();

        if ( $exists ) {
            return "Existe um registro com o id: {$id}";
        }
        throw new Exception ("Não existe um registro com o id: {$id}");
    }
    catch ( \Throwable $e) {
        return $e->getMessage();
    }
}

/**
 * insert
 * Inserir novo registro na tabela
 * usage: return insert( 'users', [ 'name' => 'Ribamar FS', 'email' => 'joao@gmail.com', 'password' => bcrypt('123456')]);
 * @param  mixed $table
 * @param  array $fields
 * @return void
 */
function insert( $table = 'users', $fields = [] ): string
{
    try {
        DB::table( $table )->insert(
            $fields
        );
        return 'Registro adicionado com sucesso ';
    }
    catch ( \Throwable $e) {
        return $e->getMessage();
    }
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
function update( $table = 'users', $whereValue, $fields = [] ): string
{
    try {
        $exists = DB::table( $table )->select( 'id' )->where( 'id' , $whereValue )->first();

        if ( $exists ) {
            DB::table( $table )
                ->where( 'id', $whereValue )
                ->update( $fields );
            return "Registro com id: {$whereValue} atualizado com sucesso";
        }
        throw new Exception( "Não existe registro com este id: {$whereValue}");
    }
    catch ( \Throwable $e) {
        return $e->getMessage();
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
function delete( $table, $id ): string
{
    try {
        $exists = DB::table( $table )->select( 'id' )->where( 'id', $id )->first();

        if ( $exists ) {
            DB::table( $table )
                ->where( 'id', $id )
                ->delete();
            return "Registro com id: {$id} excluído com sucesso";
        }
        throw new Exception( "Não existe registro com este id: {$id}");
    }
    catch ( \Throwable $e) {
        return $e->getMessage();
    }
}

