<?php include('controle/politburo/clef_politburo.php'); ?>
<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section><article>
			<h1>Modification du du message</h1>

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

			<h2>Champs à modifier</h2>

			<fieldset>
 					<form method="post" action="pol_confirmer_modif_message.php" enctype="multipart/form-data">
 					<!-- Mail -->
 					<?php if ($modifmail==1) { ?>
	 					<p>
							Modifier le mail : <input type="text" name="email"/>
							<input type="hidden" name="modifmail" value="1">
						</p>
 					<?php }else{ ?>
 						<input type="hidden" name="modifmail" value="0">
 					<?php } ?>

 					<!-- Lien -->
 					<?php if ($modiflien==1) { ?>
						<p>
							Modification du lien : <input type="url" name="lien"/>
							<input type="hidden" name="modiflien" value="1">
						</p>
	 				<?php }else{ ?>
	 					<input type="hidden" name="modiflien" value="0">
	 				<?php } ?>

	 				<!-- Image -->
	 				<?php if ($modifimage==1) { ?>
						<p> Modifier l'image
			                <input type="file" name="image" /><br />
			                <input type="hidden" name="modifimage" value="1">
						</p>
	 				<?php }else{ ?>
	 					<input type="hidden" name="modifimage" value="0">
	 				<?php } ?>

	 				<!-- Texte -->
	 				<?php if ($modiftexte==1) {?>
						<p>
							Modifier le texte<br />
							<textarea name="tpost" id="tpost"></textarea>
							<input type="hidden" name="modiftexte" value="1">
						</p>
	 				<?php }else{ ?>
	 					<input type="hidden" name="modiftexte" value="0">
	 				<?php } ?>
					<p>
						<input type="submit" name="submit" value="Envoyer" />
					</p>
					<input type="hidden" name="idsujet" value="<?php echo $idsujet; ?>" />
					<input type="hidden" name="id_message" value="<?php echo $id_message; ?>">
				</form>
			</fieldset>



		</article></section>

	<?php include("vue/footer.php"); ?>

	</body>
</html>
