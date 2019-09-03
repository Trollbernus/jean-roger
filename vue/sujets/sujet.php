<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section>
			<h1><?php echo $titre['titre']; ?></h1>

			<?php
			foreach($messages as $message)
			{?>
			<section class="bloc">
				<article>
	 				<p>
		 				<?php  
							echo $message['texte']; 
							echo $message['nomfichier'];
							$ordre=$message['ordre']; // enregistre le dernier numero dans cette variable
						?>
					</p>
					<br/><br/>
				</article>
				<aside>
					<p> <em> Posté le <?php echo $message['date'];?> </em></p>
					<p><?php echo $message['lien'];?> </p>
 				</aside>
			</section>
			<?php
			}
			?>

			<?php if($formulaire==0){ echo '<h1>Ce sujet est verrouillé, vous ne pouvez pas répondre.</h1>'; } ?>

		</section>

		<section>

			<?php if ($formulaire==1) { ?>

			<section class="bloc">
				<article>
					<h1 id="repondre">Répondre</h1>

					<p>Avant de répondre, assurez-vous d'avoir pris connaissance de <a href="index.php?section=charte">la charte</a>.<br/>
					</p>
					<!--<fieldset>-->
	 					<form method="post" action="repondre.php" enctype="multipart/form-data">
		 					<p>
								<!-- <label for="email"> -->Votre email (facultatif)<!-- </label> --> : <input type="email" name="email"/>
							</p>
							<p>
								<!-- <label for="lien"> -->Lien (facultatif)<!-- </label> --> : <input type="url" name="lien"/>
							</p>
							<p> Envoyer une image 
				                <input type="file" name="image" /><br />
				                <!-- <input type="submit" value="Envoyer l'image" /> -->
				                Seules les images au format .jpg, .png et .gif sont acceptées. Largeur max : 900px.
							</p>
								<p>
								<!-- <label for="tpost"> -->Ou bien poster du texte</label><br />
								<textarea name="tpost" id="tpost"></textarea>
							</p>
							<p> <img src="modele/sujets/captcha2.php" alt="Code de vérification" />

							<label>Recopier le code à gauche</label> : <input type="text" name="captcha" /></p>

							<p>
								<input type="submit" name="submit" value="Envoyer" />
							</p>
							<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?> />
						</form>
					<!--</fieldset>-->


				</article>
			</section>

			<?php } ?>
		</section>

		<?php include("vue/footer.php"); ?>

	</body>
</html>
