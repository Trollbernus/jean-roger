<?php 
// si la preco n'est pas etablie on fait croire que la page n'existe pas
if ( !isset($_SESSION['preconnexion']) OR ($_SESSION['preconnexion']!=1) ) {
	header('Location: index.php?section=erreur404');
}
?>

<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>



		<section><article>
			<h1>GOULAG.</h1>

			<p>Peuh. Choqué déçu. Kasstoi.</p>

			<p><img src="vue/images/stalinepakonten.gif"></p>

			<p><?php echo $_SESSION['message']; ?></p>

			<p><a href="index.php">Retour au forum</a></p>

		</article></section>


		<?php include("vue/footer.php"); ?>

	</body>
</html>

