<?php 
	function afficherdatepost($x)
{
		$j=date('j');
		$m=date('m');
		$a=date('Y');
		$h=date('H');
		$mi=date('i');
		// echo 'Posté le ' . j . '/' . m . '/' . a .' à '. h.'h'.m.'.'; 
		if($x==1) echo "Posté le $j/$m/$a à ${h}h$mi";
}

class Membre
{
    private $pseudo;
    private $email;
    private $signature;
    private $rang;

    public function getPseudo()
    {
        return $this->pseudo;
    }

	public function setPseudo($nouveauPseudo)
	{
	    // Vérifier si le nouveau pseudo n'est ni vide ni trop long
	    if (!empty($nouveauPseudo) AND strlen($nouveauPseudo) < 100)
	    {
	        // Ok, on change son pseudo
	        $this->pseudo = $nouveauPseudo;
	    }else{
	    	echo 'Erreur dans l\'attribution du nouveau pseudo ! <br/>';
	    }
	}

    public function envoyerEMail($titre, $message)
    {
        mail($this->email, $titre, $message);
    }

    public function getRang()
    {
    	return $this->rang;
    }
    
    // quatre rangs : admin, modo, utilisateur, banni
    public function bannir()
    {
        $this->rang = 'banni';
        $this->envoyerEMail('Vous avez été banni', 'Ne revenez plus !');
    }

    public function __construct($idMembre) // on verra plus tard si necessaire
    {
    	// Récupérer en base de données les infos du membre
    	// SELECT pseudo, email, signature, actif FROM membres WHERE id = ...
    	
    	// Définir les variables avec les résultats de la base
    	//$this->pseudo = $donnees['pseudo'];
    	//$this->email = $donnees['email'];
    	// etc.
    }



}

?>
