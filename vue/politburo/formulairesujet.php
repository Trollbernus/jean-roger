<?php include('controle/politburo/clef_politburo.php'); ?>
<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section>
			<article>
				<h1 class="politburo">
					Modifier le sujet <em><?php echo $prop_sujet['titre']; ?></em>
				</h1>

				<p class="politburo"> Modifier le titre du sujet :
					<fieldset>
						<form method="post" action="pol_modif_titre.php" enctype="multipart/form-data">
		 						<textarea name="nouveau_titre" id="nouveau_titre"></textarea>
								<!-- <label for="antibot"> --> Anti-spam : 5+3=<!-- </label> --><input type="number" name="antispam"/>
								<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?>>
								<input type="submit" name="submit" value="Modifer le titre" />
						</form>
					</fieldset>
				</p>

				<p class="politburo">Modifier l'état du sujet :</p>
				<p>
					<?php if($prop_sujet['archive']==0){ // si sujet actif on propose verrouiller ou archiver?>
						<fieldset>
							<form method="post" action="pol_modif_archive.php" enctype="multipart/form-data">
		 						<!-- <label for="antibot"> --> Anti-spam : 5+3=<!-- </label> --><input type="number" name="antispam"/>
								<input type="radio" name="archive" value=1 id=1 checked="checked" /> <label for=1>Verrouiller</label>
								<input type="radio" name="archive" value=2 id=2 /> <label for=2>Archiver</label>
								<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?>>
								<input type="submit" name="submit" value="Modifier" />
							</form>
						</fieldset>
					<?php }elseif($prop_sujet['archive']==1){ // si sujet verrouille on propose deverrouiller ou archiver?>
						<fieldset>
							<form method="post" action="pol_modif_archive.php" enctype="multipart/form-data">
		 						<!-- <label for="antibot"> --> Anti-spam : 5+3=<!-- </label> --><input type="number" name="antispam"/>
								<input type="radio" name="archive" value=0 id=0 /> <label for=0>Déverrouiller</label>
								<input type="radio" name="archive" value=2 id=2 checked="checked" /> <label for=2>Archiver</label>
								<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?>>
								<input type="submit" name="submit" value="Modifier" />
							</form>
						</fieldset>
					<?php }elseif($prop_sujet['archive']==2){ // si sujet archive on propose deverrouiller ou desarchiver?>
						<fieldset>
							<form method="post" action="pol_modif_archive.php" enctype="multipart/form-data">
		 						<!-- <label for="antibot"> --> Anti-spam : 5+3=<!-- </label> --><input type="number" name="antispam"/>
								<input type="radio" name="archive" value=0 id=0 /> <label for=0>Déverrouiller</label>
								<input type="radio" name="archive" value=1 id=1 checked="checked" /> <label for=1>Désarchiver</label>
								<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?>>
								<input type="submit" name="submit" value="Modifier" />
							</form>
						</fieldset>
					<?php } ?>
				</p>

				<?php if ($prop_sujet['suppr']==0){ ?>
					<p class="politburo">Supprimer le sujet
						<fieldset>
							<form method="post" action="pol_supprimer_sujet.php" enctype="multipart/form-data">
		 						<!-- <label for="antibot"> --> Anti-spam : 5+3=<!-- </label> --><input type="number" name="antispam"/>
								<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?>>
								<input type="submit" name="submit" value="Supprimer !" />
							</form>
						</fieldset>
					</p>				
				<?php }elseif($prop_sujet['suppr']==1){ ?>
					<p class="politburo">Désupprimer le sujet
						<fieldset>
							<form method="post" action="pol_desupprimer_sujet.php" enctype="multipart/form-data">
		 						<!-- <label for="antibot"> --> Anti-spam : 5+3=<!-- </label> --><input type="number" name="antispam"/>
								<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?>>
								<input type="submit" name="submit" value="Désupprimer" />
							</form>
						</fieldset>
					</p>				
				<?php } ?>


			</article>
		</section>

		<section>
			<?php
			foreach($messages as $message)
			{?>
			<section class="bloc">
				<?php if($message['suppr']){ ?>
					<article class="suppr">
						<h3 class="politburo">Attention ! Ce message a été supprimé.</h3>
				<?php }else{ ?>
					<article>
				<?php } ?>
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
					<p><?php if($message['mail']!="v"){ echo $message['mail'];}?></p>
					<p class="politburo"> Modifier ce message : <br/>
						<fieldset>
							<form method="post" action="pol_modif_message.php" enctype="multipart/form-data">
								<ul>
									<li><input type="checkbox" value="1" name="mail" id="mail" /> <label for="case">Modifier l'email</label></li>
									<li><input type="checkbox" value="1" name="lien" id="lien" /> <label for="case">Modifier le lien</label></li>
									<li><input type="checkbox" value="1" name="texte" id="texte" /> <label for="case">Modifier le texte</label></li>
									<li><input type="checkbox" value="1" name="image" id="image" checked="checked" /> <label for="case">Modifier l'image</label></li>
									<li><input type="submit" name="submit" value="Modifier" /></li>
									<li><input type="hidden" name="id_message" value=<?php echo $message['id']; ?> /></li>
									<li><input type="hidden" name="idsujet" value=<?php echo $idsujet; ?> /></li>
								</ul>
							</form>
						</fieldset>
					</p>
					<p class="politburo">Déplacer ce message :<br/>
						<fieldset>
							<form method="post" action="pol_deplacer_message_intra.php" enctype="multipart/form-data">
								<input type="submit" name="submit" value="Déplacer ici" />
								<input type="hidden" name="id_message" value="<?php echo $message['id']; ?>" />
								<input type="hidden" name="idsujet" value="<?php echo $idsujet; ?>" />
							</form>
							<form method="post" action="pol_deplacer_message_extra.php" enctype="multipart/form-data">
								<input type="submit" name="submit" value="Déplacer ailleurs" />
								<input type="hidden" name="id_message" value=<?php echo $message['id']; ?> />
							</form>
						</fieldset>
					</p>
					<?php if ($message['suppr']){ ?>
						<p class="politburo"> Désupprimer ce message :
							<fieldset>
									<form method="post" action="pol_desuppr_message.php" enctype="multipart/form-data">
									<input type="submit" name="submit" value="Désupprimer" />
									<input type="hidden" name="id_message" value=<?php echo $message['id']; ?> />
									<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?> />
								</form>
							</fieldset>
						</p>
						
					<?php }else{ ?>
						<p class="politburo"> Supprimer ce message :
							<fieldset>
								<form method="post" action="pol_suppr_message.php" enctype="multipart/form-data">
									<input type="submit" name="submit" value="Supprimer" />
									<input type="hidden" name="id_message" value=<?php echo $message['id']; ?> />
									<input type="hidden" name="idsujet" value=<?php echo $idsujet; ?> />
								</form>
							</fieldset>
						</p>
					<?php } ?>
				</aside>
			</section>
		<?php
		}
		?>
		</section>




		<?php include("vue/footer.php"); ?>

	</body>
</html>
