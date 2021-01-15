<?php include('Encabezado.php'); ?>

<strong><h5>Solicitudes recibidas</h5></strong>
<div class = "right-align">
      <a href = "Modificar.php" class=" btnNuevo btn-floating btn-large cyan pulse"><i class="material-icons">add</i></a>
</div>

    <table id="tbDatos">
       <thead>
           <tr>
               <th></th>
               <th>Cedula</th>
               <th>Nombre</th>
               <th>Apellido</th>
               <th>Ciudad</th>
               <th>Curso</th>
               <th>Comentario</th>
           </tr>
       </thead>
       <tbody class = "striped">

       <?php
            $files = scandir('Informacion');
            
            foreach($files as $file){
            $ruta = "Informacion/{$file}";
            if(is_file($ruta)){
                
              $data = file_get_contents($ruta);
              $data = json_decode($data,1);
              echo "
                 <tr>
                     <td><img style= 'height:40px;' src ='foto/{$data['cedula']}.jpg'></td>
                     <td>{$data['cedula']}</td>
                     <td>{$data['nombre']}</td>
                     <td>{$data['apellido']}</td>
                     <td>{$data['ciudad']}</td>
                     <td>{$data['curso']}</td>
                     <td>{$data['comentario']}</td>
                     <td>
                         <a class = 'btn' href = 'Modificar.php?ced={$data['cedula']}'>
                         
                         <i class='material-icons'>edit</i>

                         </a>                    
                     </td>           
                 </tr>              
              ";
            }

          }
      ?>
             
       </tbody>
   </table>

   <a></a>

<?php include("pie.php"); ?>

<script>
      $(document).ready(function(){
    $('.btnNuevo').floatingActionButton();
  });
    
</script>
