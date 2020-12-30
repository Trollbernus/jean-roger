		<header>
			<link rel="icon" href="vue/images/charte_bouton_ico.gif" type="image/gif">
			<a class="header" href="index.html"></a>
			<a href="index.php"><img  id="debut" class="head" src="vue/images/banniere_test.png" alt="Commune Dessinée" title="Commune Dessinée"></a>
		</header>


		<nav>
			<ul>
				<li> <a href="index.php"><img src="vue/images/accueil_bouton.gif"> Accueil</a></li>
				<li> <a href="index.php?section=a_propos"><img src="vue/images/a_propos_bouton.gif"> À propos</a> </li>
				<li> <a href="index.php?section=charte"><img src="vue/images/charte_bouton.gif"> Charte</a></li>
				<li> <a href="index.php?section=contact"><img src="vue/images/lettre_bouton.gif"> Contact</a></li>
				<!-- <li> <a href="archives.php">Archives</a> </li> -->
				<?php if( (isset($_SESSION['politburo'])) AND ($_SESSION['politburo']==1) ){ ?>
					<li><a href="pol_index.php">Tableau de bord du Politburo</a></li>
					<li><a href="deconnexion_politburo.php">Sortir du Politburo</a></li>
				<?php } ?>
			</ul>
		</nav>
