<?php 
	function afficherdatepost($x)
{
		$j=date('j');
		$m=date('m');
		$a=date('Y');
		$h=date('H');
		$mi=date('i');
		// echo 'Posté le ' . j . '/' . m . '/' . a .' à '. h.'h'.m.'.'; 
		if($x==1) echo "Posté le $j/$m/$a à ${h}h$mi";
}
?>
