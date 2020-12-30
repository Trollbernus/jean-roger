<?php include('controle/politburo/clef_politburo.php'); ?>
<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section>
			<article>
				<h1>Confirmation de modification du message</h1>

				<p>Aperçu de la modification du message. Ancien message :</p>
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

			<p>Nouveau message (modifications en rouge) :</p>

			<section class="bloc">
				<article>
					<?php echo $affichetextmod.'<br>'; ?>
					<?php echo $afficheimagemod.'<br>'; ?>

				</article>
				<aside>
					<p> <em> Posté le <?php echo $date;?> </em></p>
					<p><?php echo $affichelienmod; ?> </p>
					<p><?php echo $affichemailmod; ?></p>
				</aside>
			</section>


			<article>
				<!-- Attention !! Il faudra remettre des 'v' dans les champs vides pendant la modif. -->
				<h2>Confirmer</h2>
					<a href="pol_index.php?section=formulairesujet&id_sujet=<?php echo $idsujet; ?>">Non, je me suis complètement planté.
					</a>

					<form method="post" action="pol_message_modifie.php" enctype="multipart/form-data">
						<input type="hidden" name="idsujet" value="<?php echo $idsujet; ?>">
						<input type="hidden" name="id_message" value="<?php echo $id_message; ?>">
						<input type="hidden" name="textmod" value="<?php echo $textmod; ?>">
						<input type="hidden" name="emailmod" value="<?php echo $emailmod; ?>">
						<input type="hidden" name="imagemod" value="<?php echo $imagemod; ?>">
						<input type="hidden" name="lienmod" value="<?php echo $lienmod; ?>">
						<input type="hidden" name="confirmer" value="1">
						<input type="submit" name="submit" value="Oui, je confirme !" />
					</form>
			</article>
		</section>

	<?php include("vue/footer.php"); ?>

	</body>
</html>
