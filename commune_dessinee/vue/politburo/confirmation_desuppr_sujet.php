<?php include('controle/politburo/clef_politburo.php'); ?>
<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section><article>
			<h1>Confirmation de désuppression du sujet</h1>

			<p>
				<?php 
					echo $reponse ;
				?>
			</p>
			<h2>Confirmer</h2>
				<form>
					<input type="button" value="Non, je me suis trompé." onclick="history.go(-1)">
				</form>
				<form method="post" action="pol_confirmer_desuppression_sujet.php" enctype="multipart/form-data">
					<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?>>
					<p>
						<input type="submit" name="submit" value="Oui, je confirme !" />
					</p>
				</form>


		</article></section>

	<?php include("vue/footer.php"); ?>

	</body>
</html>
