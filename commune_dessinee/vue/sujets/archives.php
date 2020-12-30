<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<!-- D'abord on affiche les sujets ouverts -->
		<section>
			<h1>Archives</h1>

			<?php
			foreach($sujets_archives as $sujet)
			{
				?>
				<p>
					<!-- Lien vers le sujet ouvert -->
					<?php $idsujet=$sujet['id'] ;?>
					<a href="index.php?section=sujet&id_sujet=<?php echo $idsujet ?>&archive=1"><?php echo $sujet['titre'] ?></a>
					<!-- Affichage de la date du dernier message -->
					<em>Dernier message : <?php echo $sujet['date_f']; ?></em>
				</p>
			<?php
			}
			?>
			<!-- Retour vers le fofococo -->
			<p><a href="index.php">Retour au forum</a></p>

		</section>


		<?php include("vue/footer.php"); ?>

	</body>
</html>
