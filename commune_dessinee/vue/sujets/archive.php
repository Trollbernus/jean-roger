<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section>
			<h1><?php
				// foreach ($ttitre as  $titre) {
					echo $titre['titre'];
				// }
			?></h1>

			<?php
			foreach($messages as $message)
			{
				?>
			<article>
				<aside>
					<p> <em> Posté le <?php echo $message['date'];?> </em></p>
					<p><?php echo $message['lien'];?> </p>
 				</aside>
 				<p>
	 				<?php  
						echo $message['texte']; 
						echo $message['nomfichier'];
						$ordre=$message['ordre']; // enregistre le dernier numero dans cette variable
					?>
				</p>
				<br/><br/>
			</article>
			<?php
			}
			?>
		</section>
		<section><article>
			<h1 id="repondre">Répondre</h1>

			<p>Avant de répondre, assurez-vous d'avoir pris connaissance de <a href="index.php?section=charte">la charte</a>.<br/>
			</p>
			<fieldset>
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
					<p>
						<!-- <label for="antibot"> -->Anti-spam : 5+3=<!-- </label> --><input type="number" name="antispam"/>
					</p>
					<p>
						<input type="submit" name="submit" value="Envoyer" />
					</p>
					<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?> />
				</form>
			</fieldset>


		</article></section>

		<?php include("vue/footer.php"); ?>

	</body>
</html>
