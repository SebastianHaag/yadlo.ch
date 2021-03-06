<?php session_start();

if(!$_POST) exit;

///////////////////////////////////////////////////////////////////////////

// Simple Configuration Options

// Enter the email address that you want to emails to be sent to.

$address = "sebastian@yadlo.ch";


// END OF Simple Configuration Options

///////////////////////////////////////////////////////////////////////////



$email    = $_POST['email'];
$firstname     = $_POST['firstname'];
$lastname     = $_POST['lastname'];
$age    = $_POST['age'];
$phone    = $_POST['phone'];
$remarks = $_POST['remarks'];


// Important Variables
//$session = $_SESSION['verify'];
$error = '';


if(trim($email) == '') {
   $error .= 'Ton adresse email est nécessaire';
} elseif(!isEmail($email)) {
   $error .= 'Merci de vérifier ton adresse email';
}


if($error != '') {
   echo '<p>Oups, il y a une erreur quelque part</p>';
   echo '<p class="error">' . $error . '</p>';


} else {

   if(get_magic_quotes_gpc()) { $remarks = stripslashes($remarks); }

   // Configuration de l'email re�u

   $e_subject = 'You\'ve been contacted by ' . $firstname . '.';

   // Advanced Configuration Option.
   // You can change this if you feel that you need to.
   // Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.
   $msg = "$firstname $lastname, $age ans, s'est inscrit à Lance L'eau du Lac.\r\n\n";
   $msg .= "$remarks\r\n\n";
   $msg .= "Tu peux contacter $firstname $lastname: $email ou $phone.\r\n\n";




   if(mail($address, $e_subject, $msg, "From: $email\r\nReturn-Path: $email\r\n")) {

      echo "<fieldset>";
      echo "<div id='success_page'>";
      echo "<p>Ton inscription a bien été envoyée</p>";
      echo "<p>Merci <strong>$firstname</strong>, nous te recontactons prochainement!</p>";
      echo "</div>";
      echo "</fieldset>";

   } else {

      echo 'ERROR!'; // Dont Edit.

   }

}



function isEmail($email) { // Email address verification, do not edit.

   return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));

}
?>
