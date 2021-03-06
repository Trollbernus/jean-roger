<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<!-- D'abord on affiche les sujets ouverts -->
		<section><article>
			<h1>Sujets ouverts</h1>

			<?php
			foreach($sujets_actifs as $sujet)
			{
				?>
				<p>
					<!-- Lien vers le sujet ouvert (encore a faire !!) -->
					<?php $idsujet=$sujet['id'] ;?>
					<a href="controle/sujets/sujet.php?id_sujet=<?php echo $idsujet ?>"><?php echo $sujet['titre'] ?></a>
					<!-- Affichage de la date du dernier message -->
					<em>Dernier message : <?php echo $sujet['date_f']; ?></em>
				</p>
			<?php
			}
			?>
		</article></section>

		<!-- Ensuite on fait de meme pour les sujets fermes -->
		<section><article>
			<h1>Sujets verrouillés</h1>

			<?php
			foreach($sujets_verrouilles as $sujet)
			{
				?>
				<p>
					<!-- Lien vers le sujet ouvert (encore a faire !!) -->
					<?php $idsujet=$sujet['id'] ;?>
					<a href="controle/sujets/sujet.php?id_sujet=<?php echo $idsujet ?>"><?php echo $sujet['titre'] ?></a>
					<!-- Affichage de la date du dernier message -->
					<em>Dernier message : <?php echo $sujet['date_f']; ?></em>
				</p>
			<?php
			}
			?>

			<!-- Lien vers les archives (a faire !!!) -->
			<p><a href="controle/sujets/archives.php">Sujets archivés</a></p>
		</article></section>

		<?php include("vue/footer.php"); ?>

	</body>
</html>
