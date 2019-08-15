<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section><article>
			<h1><?php
				foreach ($ttitre as  $titre) {
					echo $titre['titre'];
				}
			?></h1>

			<?php
			foreach($messages as $message)
			{
				?>
				<aside>
					<p> <em> Posté le <?php echo $message['date'];?> </em></p>
					<p><?php echo $message['lien'];?> </p>
 				</aside>
 				<p>
	 				<?php  
						echo $message['texte']; 
						echo $message['nomfichier'];
					?>
				</p>
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

		<?php include("vue/footer.php"); ?>

	</body>
</html>
