<?php
if (isset($_POST['login']) AND isset($_POST['pass']))
{
    $login = $_POST['login'];
    $pass_crypte = password_hash($login, PASSWORD_BCRYPT);
    // version obsolete
    // $pass_crypte = crypt($_POST['pass'], 'staline_l_homme_que_nous_aimons_le_plus'); // On crypte le mot de passe

    echo '<p> identifiant : ' . $login . '       mot de passe : ' . $_POST['pass']. '</p>';

    echo '<p>Ligne à copier dans le .htpasswd :<br />' . $login . ':' . $pass_crypte . '</p>';
}

else // On n'a pas encore rempli le formulaire
{
?>

<p>Entrez votre login et votre mot de passe pour le crypter.</p>

<form method="post">
    <p>
        Login : <input type="text" name="login"><br />
        Mot de passe : <input type="text" name="pass"><br /><br />
    
        <input type="submit" value="Crypter !">
    </p>
</form>

<?php
}
?>