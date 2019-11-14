<?php

function input($nombre, $label, $valor = '')
{
    return <<<CODIGO

    <div class="input-group flex-nowrap">
    <div class="input-group-prepend">
      <span class="input-group-text" id="addon-wrapping">{$nombre}</span>
    </div>
    <input value="$valor" name="$nombre" type="text" class="form-control" placeholder="$label" aria-label="$nombre" aria-describedby="addon-wrapping">
  </div>
    
    
CODIGO;
}

