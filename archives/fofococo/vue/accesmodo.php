<?php
 session_start();
?>
<!DOCTYPE html>
<html>

	<!--********************
	*        Entête
	*********************-->
	<?php include("head.php"); ?>

	<!--********************
	*		Corps
	*********************-->

	<body>
		
		<?php include("headernav.php"); ?>

		<section>
			<article>
				<p><?php 
					$test=$_POST['motdepasse'];
					if ((isset($test)) AND ($test=="lisezmarx")) { //anti spam
						echo 'Bienvenue sur l\'accès de modération.';
						$_SESSION['moderation']=1;
					}else{
						echo 'Mot de passe erroné. Va faire un petit tour au goulag autogéré.';
						$_SESSION['moderation']=0;
					}
				?></p>
				<p><a href="topic.php">Retour au topic</a></p>
				<p><a href="forum.php">Retour au forum</a></p>
			</article>
		</section>


		<?php include("footer.php"); ?>

	</body>

</html>
