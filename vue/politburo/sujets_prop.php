<?php include('controle/politburo/clef_politburo.php'); ?>
<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section><article>
			<h1>Modifier un sujet</h1>
			<?php if ($suppr==1): ?>
				<p class="politburo"> Attention : il s'agit des sujets supprimés.</p>
			<?php endif ?>

		<!-- D'abord on affiche les sujets ouverts -->
			<h2>Sujets ouverts</h2>

			<?php
			foreach($sujets_actifs as $sujet)
			{
				?>
				<p>
					<!-- Lien vers le sujet ouvert -->
					<?php $idsujet=$sujet['id'] ;?>
					<a href="pol_index.php?section=formulairesujet&id_sujet=<?php echo $idsujet ?>"><?php echo $sujet['titre'] ?></a>
					<!-- Affichage de la date du dernier message -->
					<em>Dernier message : <?php echo $sujet['date_f']; ?></em>
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
					<!-- Lien vers le sujet ouvert -->
					<?php $idsujet=$sujet['id'] ;?>
					<a href="pol_index.php?section=formulairesujet&id_sujet=<?php echo $idsujet ?>"><?php echo $sujet['titre'] ?></a>
					<!-- Affichage de la date du dernier message -->
					<em>Dernier message : <?php echo $sujet['date_f']; ?></em>
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
					<!-- Lien vers le sujet ouvert -->
					<?php $idsujet=$sujet['id'] ;?>
					<a href="pol_index.php?section=formulairesujet&id_sujet=<?php echo $idsujet ?>"><?php echo $sujet['titre'] ?></a>
					<!-- Affichage de la date du dernier message -->
					<em>Dernier message : <?php echo $sujet['date_f']; ?></em>
				</p>
			<?php
			}
			?>

		</article></section>


		<?php include("vue/footer.php"); ?>

	</body>
</html>
