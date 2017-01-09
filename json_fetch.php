<?php

$servidor = "localhost";
$usuario  = "username";
$senha    = "password";

$conn = mysql_connect($servidor, $usuario, $senha);

$SQL = "SELECT id_usuario, nome, email, status FROM tb_usuarios";

$table = mysql_query($SQL) or die(mysql_error());

while ($row = mysql_fetch_array($table));{
   // utilizado para definir o array quando houver mais de 1 registro retornado.
   $i=0;
   foreach($row as $key => $value){
     if (is_string($key)){
       // Irá criar um array com o nome do campo 
       // como chave (Key) e o valor (Value).
       $fields[mysql_field_name($table,$i++)] = $value;
     }
   }

   // $json_result é o array que receberá 
   // os valores do array $fields
   // "bindings" é um nome que utilizei para dar nome ao objeto.
   // Você pode usar qualquer palavra.
   
   $json_result["bindings"] [ ] =  $fields;
}

$JSON = json_encode($json_result);

?>