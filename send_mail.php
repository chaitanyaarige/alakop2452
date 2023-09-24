<?php
if (isset($_POST["submit"])) {
  // Checking For Blank Fields..
  if ($_POST["vname"] == "" || $_POST["vemail"] == "" || $_POST["sub"] == "" || $_POST["msg"] == "") {
    echo "Fill All Fields..";
  } else {
    // Check if the "Sender's Email" input field is filled out
    $email = $_POST['vemail'];
    // Sanitize E-mail Address
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    // Validate E-mail Address
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {
      echo "Invalid Sender's Email";
    } else {
      $subject = $_POST['sub'];
      $message = $_POST['msg'];
      $headers = 'From:' . $email2 . "rn"; // Sender's Email
     // $headers .= 'Cc:' . $email2 . "rn"; // Carbon copy to Sender
      // Message lines should not exceed 70 characters (PHP rule), so wrap it
      $message = wordwrap($message, 70);
      // Send Mail By PHP Mail Function
      mail("chaitanya@alakopdigital.com, chaitanyaarige@gmail.com", $subject, $message, $headers);
      echo "Your mail has been sent successfuly ! Thank you for your feedback";
    }
  }
}


<?php
if (isset($_REQUEST['email'])) {
  //Email information
  $admin_email = "chaitanya@alakopdigital.com, chaitanyaarige@gmail.com";
  $email = $_REQUEST['email'];
  $subject = $_REQUEST['subject'];
  $comment = $_REQUEST['comment'];

  //send email
  mail($admin_email, "$subject", $comment, "From:" . $email);

  //Email response
  echo "Thank you for contacting us!";
}

//if "email" variable is not filled out, display the form
else {
  ?>
<form method="post">
    Email: <input name="email" type="text" />
    Subject: <input name="subject" type="text" />
    Message:
    <textarea name="comment" rows="15" cols="40"></textarea>
    <input type="submit" value="Submit" />
</form>
<? php
}  
?>
 