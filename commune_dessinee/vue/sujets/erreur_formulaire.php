<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section><article>
			<h1>Erreur d'envoi du message</h1>

			<p>
				<?php 
					echo $reponse ;
				?>
			</p>
			<p>
				<form>
					<input type="button" value="Retour" onclick="history.go(-1)">
				</form>
			</p>
		</article></section>

	<?php include("vue/footer.php"); ?>

	</body>
</html>