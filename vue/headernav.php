		<header>
			<a class="header" href="index.html"></a>
			<a href="index.php"><img class="head" src="vue/images/banniere_fofococo.jpeg" alt="Fofo Coco" title="Fofo Coco"></a>
		</header>


		<nav>
			<ul>
				<li> <a href="index.php">Accueil</a></li>
				<li> <a href="index.php?section=a_propos">À propos</a> </li>
				<li> <a href="index.php?section=contact">Contact</a></li>
				<li> <a href="archives.php">Archives</a> </li>
				<?php if( (isset($_SESSION['politburo'])) AND ($_SESSION['politburo']==1) ){ ?>
					<li><a href="pol_index.php">Tableau de bord du Politburo</a></li>
					<li><a href="deconnexion_politburo.php">Sortir du Politburo</a></li>
				<?php } ?>
			</ul>
		</nav>
