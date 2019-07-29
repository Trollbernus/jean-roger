<!DOCTYPE html>
<html>

	<!--********************
	*        Entête
	*********************-->
	<?php include("head.php"); ?>

	<!--********************
	*		Corps
	*********************-->

	<body>
		
		<?php include("headernav.php"); ?>

		<section>
			<article>
				<p><?php 
					$envoipaquet=0;
	                $infosfichier = pathinfo($_FILES['image']['tmp_name']);
	                $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
	                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
	                $image_sizes = getimagesize($_FILES['image']['tmp_name']);
	                $maxwidth=900;
	                $datepost = date('d/m/Y');
	
					if ($_POST['antispam']!=8) { //anti spam
						echo 'Dégage sale robot (ou apprends à compter)';
					}elseif ((strlen($_POST['tpost'])<=1)&&(!(isset($_FILES['image'])))) {
						echo 'Erreur : vous devez envoyer du texte ou une image !';
					}elseif (strlen($_POST['tpost'])>=8000) {
						echo "Erreur : message trop long (limité à 8000 caractères).";
					}elseif ($_FILES['image']['error'] != 0) {
						echo "Erreur lors de l'envoi de l'image.";
					}elseif ($_FILES['image']['size'] > 2000000) {
						echo "Erreur : image trop grosse ! (limité à 2 Mo)";
					}elseif (!in_array($extension_upload, $extensions_autorisees)) {
						echo "Erreur : votre image doit être au format gif, jpg, jpeg, gif, ou png.";
					}elseif ($image_sizes[0] > $maxwidth) {
						echo "Erreur : mage trop large ! (largeur max : 900 px)";
					}else {
						echo 'Bravo ! Votre post a été effectué ';
						afficherdatepost();
						echo '<br />';
						echo 'Votre email est ' .  htmlspecialchars($_POST['email']) . '<br />'; 
						echo 'Votre lien est ' . htmlspecialchars($_POST['lien']) . '<br />';
						if (strlen($_POST['tpost'])>=1) {
							echo 'Votre texte :<br />' . htmlspecialchars($_POST['tpost']). '<br />';
						}
						if (isset($_FILES['image'])) {
							$envoipaquet=1;
						}
					}
					if ($envoipaquet==1) { // si tout est bon on envoie l'image
						// on renomme l'image
						//date
						$j=date('j');
						$m=date('m');
						$a=date('Y');
						$h=date('H');
						$mi=date('i');
						//modif de certains caracteres speciaux
						$prename=$_FILES['image']['name'];
						$prename=str_replace(' ', '_', $prename);
						$prename=str_replace('é', 'e', $prename);
						$prename=str_replace('è', 'e', $prename);
						$prename=str_replace('à', 'a', $prename);
						$prename=str_replace('ù', 'u', $prename);
						$prename=str_replace('ç', 'c', $prename);
						//suppression de tous les autres caracteres speciaux
						$prename=preg_replace("/[^a-zA-Z]/", "", $prename);
						// creation du nom
						$name='../imagesfo/'.$a.'_'.$m.'_'.$j.'_'.$h.'_'.$mi.'_'.$_POST['nomtopic'].'_'.$prename.'.'.$extension_upload;
						// envoi de l'image
						$resultat = move_uploaded_file($_FILES['image']['tmp_name'],$name);
						if ($resultat) echo 'Transfert réussi ! Votre image : <br />';
						echo '<img src="'.$name.'"> <br />';
					}

				?></p>
				<p><a href="topic.php">Retour au topic</a></p>
				<p><a href="forum.php">Retour au forum</a></p>
			</article>
		</section>


		<?php include("footer.php"); ?>

	</body>

</html>
