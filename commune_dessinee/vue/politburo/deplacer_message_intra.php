<?php include('controle/politburo/clef_politburo.php'); ?>
<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section>

			<section class="bloc">
				<article>
					<h1 class="politburo">
						Déplacer le message dans le sujet <em><?php echo $prop_sujet['titre']; ?></em>
					</h1>
				</article>
			</section>
			<section class="bloc"><article>
				<form method="post" action="pol_page_confirmer_deplacer_message_intra.php" enctype="multipart/form-data">
					<input type="submit" name="submit" value="Déplacer au début" />
					<input type="hidden" name="id_message_prec" value="0" />
					<input type="hidden" name="id_message_deplacer" value="<?php echo $idmessage; ?>" />
					<input type="hidden" name="idsujet" value="<?php echo $idsujet; ?>" />
					<input type="hidden" name="ordre" value="0" />
				</form>
			</article></section>

			<?php
			foreach($messages as $message)
			{?>
				<?php if ($message['id']!=$idmessage): ?>
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
							<form method="post" action="pol_page_confirmer_deplacer_message_intra.php" enctype="multipart/form-data">
								<input type="submit" name="submit" value="Déplacer ici" />
								<input type="hidden" name="id_message_prec" value="<?php echo $message['id']; ?>" />
								<input type="hidden" name="id_message_deplacer" value="<?php echo $idmessage; ?>" />
								<input type="hidden" name="idsujet" value="<?php echo $idsujet; ?>" />
								<input type="hidden" name="ordre" value="<?php echo $message['ordre']; ?>" />
							</form>
							<br/><br/>
						</article>

						<aside>
							<p> <em> Posté le <?php echo $message['date'];?> </em></p>
							<p><?php echo $message['lien'];?> </p>
							<p><?php if($message['mail']!="v"){ echo $message['mail'];}?></p>
						</aside>
					</section>
				<?php endif ?>
		<?php } ?>
		</section>

		<?php include("vue/footer.php"); ?>

	</body>
</html>
