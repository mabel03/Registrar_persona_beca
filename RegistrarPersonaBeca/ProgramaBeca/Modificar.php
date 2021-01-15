<?php 
              
       include('libs/utils.php');
    
       $editando = false;

    if($_POST){

          $dir = "Informacion";

          if(!is_dir($dir)){
              mkdir($dir);
          }

          $contenido = json_encode($_POST);
          file_put_contents("{$dir}/{$_POST['cedula']}.json", $contenido);

          $dir = "foto";

          if(!is_dir($dir)){
              mkdir($dir);
          }
          $archivo = $_FILES['foto'];
          if($archivo['error'] == 0){
         move_uploaded_file($archivo['tmp_name'],"foto/{$_POST['cedula']}.jpg");
          }

          header("Location:index.php");
     }
    else if(isset($_GET['ced'])){
       
        $cedula = $_GET['ced'];
        $archivo = "Informacion/{$cedula}.json";

        if(is_file($archivo)){
            $data = file_get_contents($archivo);
            $data = json_decode($data,1);
            $_POST = $data;
            $editando = true;
        }
    }
?>

<?php include("Encabezado.php");



?>
    <div class="row">
    <form enctype ="multipart/form-data" class="col s12" method = "post">
         
         <?php

         $cond =['placeholder'=>'Escribe su cedula'];
          
         if($editando){
            $cond['readonly'] = 'readonly';
         }
         echo asgInput('cedula','*-  Cedula','',$cond);
         
         ?>
         <?= asgInput('nombre','*-   Nombre','',['placeholder'=>'Escribe su nombre']);?>
         <?= asgInput('apellido','*- Apellido','',['placeholder'=>'Escribe su apellido']);?>
         <?= asgInput('ciudad','*- Ciudad','',['placeholder'=>'Escribe su ciudad']);?>
         <?= asgInput('curso','*- Curso que desea concursar','',['placeholder'=>'Ingrese el curso que desea']);?>
         <?= asgInput('comentario','*- Comentario','',['placeholder'=>'Escribe su comentario']);?>
        <?= asgInput('foto','','',['type'=>'file']);?>      
        <div class = "center-align">
        <button class = "btn" type = "submit" class="waves-effect waves-light btn">Guardar Informacion</button>
        </div>
    </form>
  </div>
  <script>
       $('#cedula').mask('000-0000000-0');
  </script>
  <?php include("pie.php");?>
