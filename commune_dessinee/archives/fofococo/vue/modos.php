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
				<h1> <!--Titre de la section-->
					Accès à la modération
				</h1>

				<fieldset>
					<form method="post" action="accesmodo.php" enctype="multipart/form-data">
 						<p>
							Mot de passe :</label><br />
							<input type="password" name="motdepasse"/>
						</p>
						<p>
							<input type="submit" name="submit" value="Envoyer" />
						</p>
					</form>
				</fieldset>
			</article>
		</section>


		<?php include("footer.php"); ?>

	</body>

</html>


