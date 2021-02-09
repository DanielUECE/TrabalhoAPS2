<?php 

session_start();

//Validação se o usuário não estiver logado (Se existir uma sessão ativa não é possível vosializar a pagina e é redirecionado para a home)
if(!isset($_SESSION['nome'])){
    header('Location: index.php?erro=1');
}


include_once('../models/autor.php');
include_once('../db.class.php');


//$dados = $_POST;


$objDb = new = db();
$link = $objDb->conecta_mysql();

$sql = "select * from autores"; 

if ($result = mysqli_query($link,$sql)){

    while($registo = mysqli_fetch_array($result, MYSQLI_ASSOC)){

        $id_autor = $registro['id'];

        echo '<a href"#" class="list-group-item">';

        echo '<strong>Id: '.$registro['id_autor'].'</strong> </br>
              <strong>Preço: '.$registro['nome_autor'].'</strong> </br> 
              ';

          }	

        echo '</p>';
    echo '<div class="clearfix"></div>';
echo '</a>';

        
    }



};















?>

