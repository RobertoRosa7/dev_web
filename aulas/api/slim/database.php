<?php
/*
* Database:
* Illuminate Database:
* Ferramenta para utilização de banco de dados - utlizada junto com Laravel
*/
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager as Capsule;

require 'vendor/autoload.php';
// instancia do slim com parâmetros para desenvolvimento
$app = new \Slim\App([
    'settings' => ['displayErrorDetails' => true]
]);
// dependency injection
$container = $app->getContainer();
$container['db'] = function(){
    $capsule = new Capsule;
    $capsule->addConnection([
        'sticky'    => true,
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'slim',
        'username'  => 'kakashi',
        'password'  => '123765',
        'charset'   => 'utf8mb4',
        'collation' => 'utf8mb4_general_ci',
        'prefix'    => '',
    ]);
    // make instance global
    $capsule->setAsGlobal();
    // communicate with database
    $capsule->bootEloquent();
    return $capsule;
};
// users routes
$app->get('/users', function(Request $request, Response $response){
    // recuperar db - schema somente para DDL
    $db = $this->get('db');
    /*
    // remove table if exists
    $db->schema()->dropIfExists('users');
    // create table
    $db->schema()->create('users', function($table){
        // create columns
        $table->increments('id');
        $table->string('name');
        $table->string('email');
        $table->timestamps();
    });
    */
    
    // Inserir registro na tabela users
    /*
    $db->table('users')->insert([
        'name' => 'kakashi',
        'email' => 'kakashi@gmail.com'
    ]);
    */

    // Update registros na tabela users - a condição deve ir antes do update
    /*
    $db->table('users')
        ->where('id', 1)
        ->update(['name'=>'roberto','email'=>'roberto@gmail.com']);
    */

    // Delete registros na tabela users
    //$db->table('users')->where('id', 1)->delete();

    // Consultar registros na tabela users
    $users = $db->table('users')->get();
    foreach($users as $user){
        echo $user->name . '<br>';
        echo $user->email . '<br>';
    }
});
$app->run();
/*
$table->bigIncrements('id');	Incrementing ID using a "big integer" equivalent
$table->bigInteger('votes');	BIGINT equivalent to the table
$table->binary('data');	BLOB equivalent to the table
$table->boolean('confirmed');	BOOLEAN equivalent to the table
$table->char('name', 4);	CHAR equivalent with a length
$table->date('created_at');	DATE equivalent to the table
$table->dateTime('created_at');	DATETIME equivalent to the table
$table->decimal('amount', 5, 2);	DECIMAL equivalent with a precision and scale
$table->double('column', 15, 8);	DOUBLE equivalent with precision, 15 digits in total and 8 after the decimal point
$table->enum('choices', array('foo', 'bar'));	ENUM equivalent to the table
$table->float('amount');	FLOAT equivalent to the table
$table->increments('id');	Incrementing ID to the table (primary key).
$table->integer('votes');	INTEGER equivalent to the table
$table->longText('description');	LONGTEXT equivalent to the table
$table->mediumInteger('numbers');	MEDIUMINT equivalent to the table
$table->mediumText('description');	MEDIUMTEXT equivalent to the table
$table->morphs('taggable');	Adds INTEGER taggable_id and STRING taggable_type
$table->nullableTimestamps();	Same as timestamps(), except allows NULLs
$table->smallInteger('votes');	SMALLINT equivalent to the table
$table->tinyInteger('numbers');	TINYINT equivalent to the table
$table->softDeletes();	Adds deleted_at column for soft deletes
$table->string('email');	VARCHAR equivalent column
$table->string('name', 100);	VARCHAR equivalent with a length
$table->text('description');	TEXT equivalent to the table
$table->time('sunrise');	TIME equivalent to the table
$table->timestamp('added_on');	TIMESTAMP equivalent to the table
$table->timestamps();	Adds created_at and updated_at columns
$table->rememberToken();	Adds remember_token as VARCHAR(100) NULL
->nullable()	Designate that the column allows NULL values
->default($value)	Declare a default value for a column
->unsigned()	Set INTEGER to UNSIGNED
*/