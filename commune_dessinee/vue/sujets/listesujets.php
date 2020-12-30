<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<!-- D'abord on affiche les sujets ouverts -->
		<section>
			<h1>Sujets ouverts</h1>

			<?php
			foreach($sujets_actifs as $sujet)
			{
				?>
				<p>
					<!-- Lien vers le sujet ouvert -->
					<?php $idsujet=$sujet['id'] ;?>
					<a href="index.php?section=sujet&id_sujet=<?php echo $idsujet ?>"><?php echo $sujet['titre'] ?></a>
					<!-- Affichage de la date du dernier message -->
					<em>Dernier message : <?php echo $sujet['date_f']; ?></em>
				</p>
			<?php
			}
			?>
			<!-- Lien vers le formulaire d'ouverture d'un nouveau sujet -->
			<a href="ouvrir_sujet.php">Ouvrir un nouveau sujet</a>
		</section>

		<!-- Ensuite on fait de meme pour les sujets fermes -->
		<section>
			<h1>Sujets verrouillés</h1>

			<?php
			foreach($sujets_verrouilles as $sujet)
			{
				?>
				<p>
					<!-- Lien vers les sujets verrouilles -->
					<?php $idsujet=$sujet['id'] ;?>
					<a href="index.php?section=sujet&id_sujet=<?php echo $idsujet ?>&archive=1"><?php echo $sujet['titre'] ?></a>
					<!-- Affichage de la date du dernier message -->
					<em>Dernier message : <?php echo $sujet['date_f']; ?></em>
				</p>
			<?php
			}
			?>

			<!-- Lien vers les archives -->
			<p><a href="archives.php">Sujets archivés</a></p>
		</section>

		<?php include("vue/footer.php"); ?>

	</body>
</html>
