<?php 
	function afficherdatepost()
{
		$j=date('j');
		$m=date('m');
		$a=date('Y');
		$h=date('H');
		$mi=date('i');
		// echo 'Posté le ' . j . '/' . m . '/' . a .' à '. h.'h'.m.'.'; 
		echo "Posté le $j/$m/$a à ${h}h$mi";
}
afficherdatepost();
?>
