<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<?php
			if ( ( !isset($_SESSION['preconnexion']) ) OR ( $_SESSION['preconnexion']!=1 ) ) {
				header('Location : index.php?section=erreur404');
			}
			if ( isset( ($_SESSION['politburo']) ) AND ( $_SESSION['politburo']==1) ) {
				header('Location: accueil_politburo.php');
			}
		?>
		<section><article>
			<h1>
				Portail du Politburo
			</h1>

			<?php if ((isset($connexion))AND($connexion==0)) {
				echo "Problème de connexion : <br/>";
				echo $reponse.'<br/>';
			} ?>

			<fieldset>
 					<form method="post" action="connexion_politburo.php" enctype="multipart/form-data">
					<p>
						Nom de l'homme que nous aimons le plus : 
						<input type="text" name="staline">
					</p>
					<p>
						Mot de passe : 
						<input type="password" name="motpasse" />
					</p>
 					<p> <img src="modele/sujets/captcha2.php" alt="Code de vérification" />

					<label>Recopier le code à gauche</label> : <input type="text" name="captcha" /></p>

<!--					<p>Anti spam : 5+3= <input type="text" name="captcha" /></p>
-->					<p>
						<input type="submit" name="submit" value="Entrer" />
					</p>
					<input type="hidden" name="token" id="token" value="<?php echo $token; ?>"/>
				</form>
			</fieldset>


		</article></section>

 		<?php include("vue/footer.php"); ?>
	</body>
</html>
