<?php include('controle/politburo/clef_politburo.php'); ?>
<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section><article>
			<h1 class="politburo">Déplacer le message dans un sujet non supprimé</h1>

		<!-- D'abord on affiche les sujets ouverts -->
			<h2>Sujets ouverts</h2>

			<?php
			foreach($sujets_actifs as $sujet)
			{
				?>
				<p>
					<!-- Proprietes du sujet -->
					<?php $idsujet=$sujet['id'] ;?>
					<?php echo $sujet['titre']; ?>
					<em>Dernier message : <?php echo $sujet['date_f']; ?></em>
					<!-- Formulaire de deplacement -->
					<form method="post" action="pol_page_confirmer_deplacement_extra.php" enctype="multipart/form-data">
						<input type="submit" name="submit" value="Déplacer ici" />
						<input type="hidden" name="idmessage" value=<?php echo $idmessage; ?> />
						<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?> />
					</form>					
				</p>
			<?php
			}
			?>

		<!-- Ensuite on fait de meme pour les sujets fermes -->
			<h2>Sujets verrouillés</h2>

			<?php
			foreach($sujets_verrouilles as $sujet)
			{
				?>
				<p>
					<!-- Proprietes du sujet -->
					<?php $idsujet=$sujet['id'] ;?>
					<?php echo $sujet['titre']; ?>
					<em>Dernier message : <?php echo $sujet['date_f']; ?></em>
					<form method="post" action="pol_page_confirmer_deplacement_extra.php" enctype="multipart/form-data">
						<input type="submit" name="submit" value="Déplacer ici" />
						<input type="hidden" name="idmessage" value=<?php echo $idmessage; ?> />
						<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?> />
					</form>					
				</p>
			<?php
			}
			?>

		<!-- Et enfin pour les sujets archives -->

			<h2>Sujets archivés</h2>

			<?php
			foreach($sujets_archives as $sujet)
			{
				?>
				<p>
					<?php $idsujet=$sujet['id'] ;?>
					<?php echo $sujet['titre']; ?>
					<em>Dernier message : <?php echo $sujet['date_f']; ?></em>
					<form method="post" action="pol_page_confirmer_deplacement_extra.php" enctype="multipart/form-data">
						<input type="submit" name="submit" value="Déplacer ici" />
						<input type="hidden" name="idmessage" value=<?php echo $idmessage; ?> />
						<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?> />
					</form>					
				</p>
			<?php
			}
			?>

		</article></section>

		<section><article>
			<h1 class="politburo"> Déplacer le message dans un sujet supprimé</h1>
		<!-- D'abord on affiche les sujets ouverts -->
			<h2>Sujets ouverts</h2>

			<?php
			foreach($sujets_actifs_suppr as $sujet)
			{
				?>
				<p>
					<!-- Proprietes du sujet -->
					<?php $idsujet=$sujet['id'] ;?>
					<?php echo $sujet['titre']; ?>
					<em>Dernier message : <?php echo $sujet['date_f']; ?></em>
					<!-- Formulaire de deplacement -->
					<form method="post" action="pol_page_confirmer_deplacement_extra.php" enctype="multipart/form-data">
						<input type="submit" name="submit" value="Déplacer ici" />
						<input type="hidden" name="idmessage" value=<?php echo $idmessage; ?> />
						<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?> />
					</form>					
				</p>
			<?php
			}
			?>

		<!-- Ensuite on fait de meme pour les sujets fermes -->
			<h2>Sujets verrouillés</h2>

			<?php
			foreach($sujets_verrouilles_suppr as $sujet)
			{
				?>
				<p>
					<!-- Proprietes du sujet -->
					<?php $idsujet=$sujet['id'] ;?>
					<?php echo $sujet['titre']; ?>
					<em>Dernier message : <?php echo $sujet['date_f']; ?></em>
					<form method="post" action="pol_page_confirmer_deplacement_extra.php" enctype="multipart/form-data">
						<input type="submit" name="submit" value="Déplacer ici" />
						<input type="hidden" name="idmessage" value=<?php echo $idmessage; ?> />
						<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?> />
					</form>					
				</p>
			<?php
			}
			?>

		<!-- Et enfin pour les sujets archives -->

			<h2>Sujets archivés</h2>

			<?php
			foreach($sujets_archives_suppr as $sujet)
			{
				?>
				<p>
					<?php $idsujet=$sujet['id'] ;?>
					<?php echo $sujet['titre']; ?>
					<em>Dernier message : <?php echo $sujet['date_f']; ?></em>
					<form method="post" action="pol_page_confirmer_deplacement_extra.php" enctype="multipart/form-data">
						<input type="submit" name="submit" value="Déplacer ici" />
						<input type="hidden" name="idmessage" value=<?php echo $idmessage; ?> />
						<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?> />
					</form>					
				</p>
			<?php
			}
			?>



		</article></section>


		<?php include("vue/footer.php"); ?>

	</body>
</html>
