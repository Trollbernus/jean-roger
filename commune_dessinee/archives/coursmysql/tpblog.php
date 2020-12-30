<?php
 session_start();
?>

<!DOCTYPE html>
<html>

	<!--********************
	*        Entête
	*********************-->
	<?php include("head.php"); ?>

	<!--********************
	*		Corps
	*********************-->

	<!-- ----------------------
		Formulaire du chat 
	------------------------- -->

	<body>
		<?php include("headernav.php"); ?>


	<!-- Connexion a la bdd. Penser a mettre ça dans un include un de ces jours.. -->
	<?php try
		{
			// On se connecte à MySQL
			$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
		}
		catch(Exception $e)
		{
			// En cas d'erreur, on affiche un message et on arrête tout
		        die('Erreur : '.$e->getMessage());
		}
		// Si tout va bien, on peut continuer


		// encodage 
		$bdd->query("SET NAMES UTF8");

		/*************************************
		Affichage de la bdd
		**************************************/	
		$req = $bdd->prepare('SELECT id,
									 auteur,
									 titre,
									 article, 
									 DATE_FORMAT(date, "le %d/%m/%Y à %Hh%im%ss") 
									 AS date 
									 FROM articlesblog ORDER BY id DESC LIMIT 0, 20');
		$req->execute();
		while ($donnees = $req->fetch())
		{
		    $idarticle=$donnees['id'];
		    ?>
		    	<article><section>
		    		<h1>  <?php echo $donnees['titre'] ?> </h1>
		    		<aside>
		    			<?php 
		    				echo 'Posté par ' . $donnees['auteur'] . ' ' . $donnees['date'];
		    			?>
		    		</aside>
		    		<p>
		    			<?php 
		    				echo $donnees["article"]
		    			?>
		    		</p>
		    		<p> <a href="commentairesblog.php?id_article=<?php echo $idarticle ?>">Commentaires</a> </p>
		    	</section></article>
		<?php }

		$req->closeCursor();

		?>

		<?php include("../src/footer.php"); ?>

	</body>

</html>
	