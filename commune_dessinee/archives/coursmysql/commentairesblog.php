<?php
 session_start();
?>

<!DOCTYPE html>
<html>
	<?php include("head.php"); ?>
	<body>
		<?php include("headernav.php"); ?>

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


		if((isset($_GET['id_article'])) AND ($_GET['id_article']>=1)){
			//numero de l'article
			$numeroarticle=$_GET['id_article'];
			/*************************************
			Affichage de la bdd
			**************************************/	
			$req = $bdd->prepare('SELECT id,
										 auteur,
										 titre,
										 article, 
										 DATE_FORMAT(date, "le %d/%m/%Y à %Hh%im%ss") 
										 AS date 
										 FROM articlesblog WHERE id=?');
			$req->execute(array($_GET['id_article']));
			while ($donnees = $req->fetch())
			{?>
		    	<article><section>
		    		<h1>  <?php echo $donnees['titre'] ?> </h1>
		    		<aside>
		    			<?php 
		    				echo 'Posté par ' . $donnees['auteur'] . ' ' . $donnees['date'];
		    			?>
		    		</aside>
		    		<p>
		    			<?php 
		    				echo $donnees["article"];
		    			?>
		    		</p>
		    	</section></article>
			<?php } ?>
	    	<section>
	    		<h2>Commentaires</h2>
			<?php
			$req = $bdd->prepare('SELECT id,
										 id_article,
										 auteur, 
										 texte,
										 DATE_FORMAT(date_commentaire, "le %d/%m/%Y à %Hh%im%ss") 
										 AS date 
										 FROM commentairesblog WHERE id_article=? ORDER BY id DESC LIMIT 0, 20');
			$req->execute(array($_GET['id_article']));
			while ($donnees = $req->fetch())
			{
				echo $donnees['auteur'].' '.$donnees['date'].'<br/>';
				echo $donnees['texte'].'<br/><br/>';
			}
			?>
    		</section>
	    	<?php
			$req->closeCursor();
		}


		?>

		<?php include("../src/footer.php"); ?>

	</body>

</html>


