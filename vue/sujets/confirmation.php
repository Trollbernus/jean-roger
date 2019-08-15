<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section><article>
			<h1>Confirmation d'envoi du message</h1>

			<p>
				<?php 
					echo $reponse ;
				?>
			</p>
			<h2>Confirmer l'envoi</h2>
			<p>Êtes-vous sûrs que votre message convient ?</p>
			<fieldset>
 					<form method="post" action="supprimer.php" enctype="multipart/form-data"> <!-- supprimer a coder !!! -->
 					<?php if (isset($name)): ?>
						<input type="hidden" name="nomfichier" value="<?php echo $name; ?>" />
 					<?php endif ?>
					<input type="hidden" name="idsujet" value="<?php echo $idsujet; ?>" />
					<p>
						<input type="submit" name="submit" value="Non, je me suis trompé." />
					</p>
				</form>
			</fieldset>
			<fieldset>
 					<form method="post" action="confirmer.php" enctype="multipart/form-data">
 					<?php if (isset($email)): ?>
						<input type="hidden" name="mail" value="<?php echo $email; ?>" />										
 					<?php endif ?>
 					<?php if (isset($lien)): ?>
						<input type="hidden" name="lien" value="<?php echo $lien; ?>" />											
 					<?php endif ?>
 					<?php if (isset($name)): ?>
											<input type="hidden" name="nomfichier" value=<?php echo $name; ?> /> 						
 					<?php endif ?>
 					<?php if (isset($text)): ?>
						<input type="hidden" name="text" value="<?php echo $text; ?>" />					
 					<?php endif ?>
					<input type="hidden" name="idsujet" value="<?php echo $idsujet; ?>" />
					<p>
						<input type="submit" name="submit" value="Oui, je confirme !" />
					</p>
				</form>
			</fieldset>


		</article></section>

	<?php include("vue/footer.php"); ?>

	</body>
</html>
