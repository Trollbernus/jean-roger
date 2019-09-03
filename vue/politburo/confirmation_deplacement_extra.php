<?php include('controle/politburo/clef_politburo.php'); ?>
<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section><article>
			<h1>Confirmation de déplacement externe du message</h1>

			<p>
				<?php 
					echo $reponse ;
				?>
			</p>

		</article>
		<section class="bloc">
			<article>
				<?php echo $texte.'<br>'; ?>
				<?php echo $image.'<br>'; ?>

			</article>
			<aside>
				<p> <em> Posté le <?php echo $date;?> </em></p>
				<p><?php echo $lien;?> </p>
				<p><?php if(($mail!="v") OR (strlen($mail)>4)){ echo $mail;}?></p>
			</aside>
		</section>

			<h2>Confirmer</h2>
				<form method="post" action="pol_index.php" enctype="multipart/form-data">
					<input type="submit" name="submit" value="Non, je me suis complètement planté et je vais faire un tour au goulag." />
				</form>

				<form method="post" action="pol_deplacer_message_extra.php" enctype="multipart/form-data">
					<input type="submit" name="submit" value="Non, je me suis trompé de sujet." />
					<input type="hidden" name="id_message" value=<?php echo $idmessage; ?> />
				</form>
 				<form method="post" action="pol_confirmer_deplacement_extra.php" enctype="multipart/form-data">
					<input type="hidden" name="idmessage" value="<?php echo $idmessage; ?>">
					<input type="hidden" name="idsujet" value="<?php echo $idsujet; ?>">
					<p>
						<input type="submit" name="submit" value="Oui, je confirme !" />
					</p>
				</form>

		</article></section>

	<?php include("vue/footer.php"); ?>

	</body>
</html>
