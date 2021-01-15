<?php 
       
       function asgInput($Id , $label, $valor= "", $opts=[]){

        $placeholder = "";
        $type = 'text';
        $readonly = '';

        if(isset($_POST[$Id])){
          
              $valor = $_POST[$Id];
        }

        extract($opts);

         return <<<INPUT

         <div class="row">
         <div class="input-field col s12">
         <input {$readonly} value = "{$valor}" placeholder="{$placeholder}" name = "{$Id}"id="{$Id}" type="{$type}" class="validate">
         <label for="first_name">{$label}</label>
         </div>
         </div>

INPUT;
       }

?>