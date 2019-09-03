<?php include('controle/politburo/clef_politburo.php'); ?>

<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section><article>
			<h1>Tableau de bord du Politburo</h1>

			<?php 
				echo $_SESSION['message'];
				$_SESSION['message']='';
			?>

			<ul>
				<li><a href="pol_index.php?section=sujets_prop">Modifier un sujet</a></li> <!-- a coder !!! -->
				<li><a href="pol_index.php?section=sujets_supprimes">Consulter les sujets supprimés</a></li> <!-- a coder !!! -->
				<!-- <li><a href="pol_index.php?section=messagerie">Consulter la messagerie du Politburo</a></li> --> <!-- a coder !!! -->
			</ul>

		</article></section>


		<?php include("vue/footer.php"); ?>

	</body>
</html>
