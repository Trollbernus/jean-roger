<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section><article>
			<h1>
				Ouverture d'un nouveau sujet
			</h1>

			<p>Avant d'ouvrir un sujet, assurez-vous d'avoir pris connaissance de <a href="index.php?section=charte">la charte</a>.<br/>
			</p>
			<fieldset>
 					<form method="post" action="nouveau_sujet.php" enctype="multipart/form-data">
 					<p> Titre du nouveau sujet :
 						<textarea name="titre_sujet" id="titre_sujet"></textarea>
 					</p>
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
					<p>
						<!-- <label for="antibot"> -->Anti-spam : 5+3=<!-- </label> --><input type="number" name="antispam"/>
					</p>
					<p>
						<input type="submit" name="submit" value="Envoyer" />
					</p>
				</form>
			</fieldset>


		</section></article>

		<?php include("vue/footer.php"); ?>

	</body>
</html>
