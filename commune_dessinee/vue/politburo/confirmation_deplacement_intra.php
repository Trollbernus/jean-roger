<?php include('controle/politburo/clef_politburo.php'); ?>
<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section>
			<article>
				<h1>Confirmation de déplacement interne du message</h1>

				<p>Aperçu du déplacement du message : </p>

			</article>

			<!-- Le message precedent -->
			<?php if($ordre_prec!=0){ // s'il existe un message precedent ?>
				<section class="bloc">
					<h2>Message précédent :</h2>
					<article>
						<?php echo $texte_prec.'<br>'; ?>
						<?php echo $image_prec.'<br>'; ?>

					</article>
					<aside>
						<p> <em> Posté le <?php echo $date_prec;?> </em></p>
						<p><?php echo $lien_prec;?> </p>
						<p><?php if(($mail_prec!="v") OR (strlen($mail_prec)>4)){ echo $mail_prec;}?></p>
					</aside>
				</section>
			<?php }else{ // sinon on dit "debut du sujet"?>
				<section class="bloc"><h2>Début du sujet</h2></section>
			<?php } ?>

			<!-- Le message a inserer -->
			<section class="bloc">
				<h2>Message inséré :</h2>
				<article>
					<?php echo $texte_deplace.'<br>'; ?>
					<?php echo $image_deplace.'<br>'; ?>

				</article>
				<aside>
					<p> <em> Posté le <?php echo $date_deplace;?> </em></p>
					<p><?php echo $lien_deplace;?> </p>
					<p><?php if(($mail_deplace!="v") OR (strlen($mail_deplace)>4)){ echo $mail_deplace;}?></p>
				</aside>
			</section>

			<!-- Le message suivant -->
			<?php if ($message_suiv!=0){ // s'il existe un message suivant ?>
				<section class="bloc">
					<h2>Message suivant :</h2>
					<article>
						<?php echo $texte_suiv.'<br>'; ?>
						<?php echo $image_suiv.'<br>'; ?>

					</article>
					<aside>
						<p> <em> Posté le <?php echo $date_suiv;?> </em></p>
						<p><?php echo $lien_suiv;?> </p>
						<p><?php if(($mail_suiv!="v") OR (strlen($mail_suiv)>4)){ echo $mail_suiv;}?></p>
					</aside>
				</section>
			<?php }else{ // sinon on dit "fin du sujet"?>
				<h2>Fin du sujet</h2>
			<?php } ?>


		</section>
		<section>

				<h2>Confirmer</h2>
				<form method="post" action="pol_index.php" enctype="multipart/form-data">
					<input type="submit" name="submit" value="Non, je me suis complètement planté et je vais faire un tour au goulag." />
				</form>

				<form method="post" action="pol_deplacer_message_intra.php" enctype="multipart/form-data">
					<input type="submit" name="submit" value="Non, je me suis trompé de déplacement." />
					<input type="hidden" name="id_message" value=<?php echo $id_message_deplace; ?> />
					<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?> />
				</form>
					<form method="post" action="pol_confirmer_deplacement_intra.php" enctype="multipart/form-data">
					<input type="hidden" name="id_message_deplace" value="<?php echo $id_message_deplace; ?>">
					<input type="hidden" name="id_message_prec" value="<?php echo $id_message_prec; ?>">
					<input type="hidden" name="ordre_prec" value="<?php echo $ordre_prec; ?>">
					<input type="hidden" name="idsujet" value="<?php echo $idsujet; ?>">
					<p>
						<input type="submit" name="submit" value="Oui, je confirme !" />
					</p>
				</form>

		</section>


	<?php include("vue/footer.php"); ?>

	</body>
</html>
