<h1>Nuevo Registro</h1>

<?php
  if(isset($formExtend))
    include_partial('form', array('form' => $form, 'formExtend' => $formExtend));
  else
    include_partial('form', array('form' => $form));
?>
