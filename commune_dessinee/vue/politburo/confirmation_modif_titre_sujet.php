<?php include('controle/politburo/clef_politburo.php'); ?>
<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section><article>
			<h1>Confirmation de modification du sujet</h1>

			<p>
				<?php 
					echo $reponse ;
				?>
			</p>
			<h2>Confirmer l'envoi</h2>
			<p>Est-ce que cela convient ?</p>
				<form method="post" action="pol_index.php?section=formulairesujet&id_sujet=<?php echo $idsujet; ?>" enctype="multipart/form-data"> <!-- supprimer a coder !!! -->
					<p>
						<input type="submit" name="submit" value="Non, je me suis trompé." />
					</p>
				</form>
				<form method="post" action="pol_confirmer_modif_titre_sujet.php" enctype="multipart/form-data">
					<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?>>
					<input type="hidden" name="nouveau_titre" value="<?php echo $titre_sujet; ?>">
					<p>
						<input type="submit" name="submit" value="Oui, je confirme !" />
					</p>
				</form>


		</article></section>

	<?php include("vue/footer.php"); ?>

	</body>
</html>
