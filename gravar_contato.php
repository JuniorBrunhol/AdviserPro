<?php
include_once 'conexao/conexao.php';






$nome = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['nome'])));
$email = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['email'])));
$telefone = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['telefone'])));
$empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['empresa'])));
$eusou = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['eusou'])));
$consultores = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['consultores'])));

$sql = "INSERT INTO contato (
nome_contato,
telefone_contato,
email_contato,
empresa_contato,
eusou_contato,
colaboradores_contato
) VALUES (
'$nome',
'$telefone',
'$email',
'$empresa',
'$eusou',
'$consultores'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));
     
    
      ini_set( 'display_errors', 1 );
      error_reporting( E_ALL );
      $from = "junior.brunhol@gmail.com";
      $to = "suporte@adviserpro.com.br";
      $subject = "Contato Site Adviser Pro";
      $message = "Nome: $nome
                  Telefone: $telefone
                  Email: $email
                  Empresa: $empresa
                  Eu sou: $eusou
                  Quantos consultores temos: $consultores";
      $headers = "From:" . $from;
      mail($to,$subject,$message, $headers);
      echo "Em breve entraremos em contato.";
  header("Location:index.html"); exit;

      

?>