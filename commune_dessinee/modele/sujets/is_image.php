<?php 
// verifie que le fichier est bien une image
function is_image($path)
{
	$controle_type_mime_autorises = ['image/gif', 'image/jpeg', 'image/pjpeg', 'image/png'];
	$fichier_mime_type = mime_content_type($path);
	//echo $fichier_mime_type;

	if(in_array($fichier_mime_type, $controle_type_mime_autorises)){
	   return TRUE;
	}else{
	   return FALSE;
	}
}

// cette fonction renvoie TRUE si elle detexte des caracteres typiques de scripts
function is_script($path)
{

	$erreur = 0;

    if (fopen($path,"r")) {
        while (!feof($path) OR $erreur == 0) {

            $buffer = fgets($path);

            switch (true) {
                case strstr($buffer,'<'):
                $erreur += 1;
                break;

                case strstr($buffer,'>'):
                $erreur += 1;
                 break;

                case strstr($buffer,';'):
                $erreur += 1;
                break;

                case strstr($buffer,'&'):
                $erreur += 1;
                break;

                case strstr($buffer,'?'):
                $erreur += 1;
                break;
            }
        }
    fclose($path);
    }else{
        $erreur=1;
    }

    if ($erreur==0) {
    	return FALSE;
    }else{
    	return TRUE;
    }

}