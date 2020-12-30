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

		<section>
			<article>
				<h1>Minichat stal</h1>

				<fieldset>
					<form method="post" action="chatformulaire.php" enctype="multipart/form-data">
						<p>
							Pseudo : <input type="text" name="pseudo" />
						</p>
						<p>
							Message : <textarea name="tpost" id='tpost'></textarea>
						</p>
							<input type="submit" name="submit" value="Envoyer" />
						</p>
					</form>
				</fieldset>
			</article>
		</section>

 	<!-- ----------------------------
 		Affichage de toute la conversation
	--------------------------------- -->

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

		?>
		<article><section>
		<?php

		/*************************************
		* Reception du formulaire
		*************************************/
		if(isset($_POST['pseudo'],$_POST['tpost'])){
			$pseudo=htmlspecialchars($_POST['pseudo']); 
			$text=htmlspecialchars($_POST['tpost']);
			if ((strlen($pseudo)<=0)||(strlen($text)<=0)) {
				echo 'Erreur lors de l\'envoi du message... <br/><br/><br/>';
			}elseif (strlen($text)>=8000) {
				echo "Erreur : message trop long (limité à 8000 caractères).<br/><br/><br/>";
			}elseif (strlen($pseudo)>=100) {
				echo "Erreur : pseudo trop long (limité à 100 caractères).<br/><br/><br/>";
			}else{
			/**************************************
			 Ajout du dernier message a la bdd
			**************************************/
				$maintenant=date("Y-m-d H:i:s");
				$req = $bdd->prepare('INSERT INTO minichat(pseudo, message, date) VALUES(:pseudo, :message, :date)');	
				$nb_supr = $req->execute(array(
				    'pseudo'=> $pseudo,
				    'message'=> $text,
				    'date' => $maintenant
				    ));	

			}
		}else{
			?>
			<p>Bienvenue sur le minchat marxiste-léniniste-stalinien !</p>
			<?php
		}

		/*************************************
		Affichage de la bdd
		**************************************/	
		$req = $bdd->prepare('SELECT pseudo, 
									 message, 
									 DATE_FORMAT(date, "le %d/%m/%Y à %Hh%im%ss") 
									 AS date 
									 FROM minichat ORDER BY numero DESC LIMIT 0, 20');
		$req->execute();
		while ($donnees = $req->fetch())
		{
		    echo $donnees['pseudo'] . ' (' . $donnees['date'] . ') ' . ' : ' . $donnees['message'] . '<br/>';
		}

		?></article></section><?php


		$req->closeCursor();

		?>

		<?php include("../src/footer.php"); ?>

	</body>

</html>


