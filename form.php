<?php
// message vars
$msg = '';
$msgClass='';

// check submit
if(filter_has_var(INPUT_POST,'submit')){
   
  $name = $_POST['name'];
  $email= $_POST['email'];
  $message = $_POST['message'];
  $subject = $_POST['subject'];


  if(!empty($email) && !empty($name) && !empty($message)){
  
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
    $msg = "OH NO! Please use vaild email";
    $msgClass = "card-panel red";
    }
    else{
      $toEmail = "mike.fazek@gmail.com";
      $subjectMsg = $subject;
      $body = "<h2>Contact Request from site</h2>
        <h4>Name</h4><p>'.$name.'</p>
        <h4>Email</h4><p>'.$email.'</p>
        <h4>Message</h4><p>'.$message.'</p>
      ";
    }
  
    $headers = "MIME-Verison 1.0" ."\r\n";
    $headers .= "Content-Type: text/html charset=UTF-8" ."\r\n";
  
    // additonal from
    $headers .= "From: " .$name. "<" .$email. ">" . "\r\n";

            if(mail($toEmail, $subject, $body, $headers)){
              $msg = "YAY! We will be in touch with you Soon!";
          $msgClass = "card-panel green";
            }
            else{
              $msg = "Oops... email was not sent..";
          $msgClass = "card-panel red";
            }
          }
            else{
            // failed
            $msg = "Oops... Please Fill in all fields";
            $msgClass = "card-panel red";
          }
        }
      
    
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Logo for Title bar -->
  <link rel="shortcut icon" href="./images/tcLogoTitleBar.png">
  <title>Taylor's Custom Homes</title>
   <!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

   <!-- Compiled and minified JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <!-- external stylesheet css -->
  <link rel="stylesheet" href="style.css">

</head>
<body id="contact-bgk">
  <a href="index.html"> <img src="./images/tcLogoTitleBar.png" alt="Taylor's Custom Homes" class="logo-image"></a>
  <!-- form -->
<div class="contact-container">
  <h2 class="contact-title">Contact Us</h2>
  <div class="row">
    <!-- php code here -->
    <form action="form.php" autocomplete="on" method="POST"  class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate" name="name" value="<?php echo isset($_POST['name'])? $name : ''; ?>
          ">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" name="name" value="<?php echo isset($_POST['name'])? $name : ''; ?>">
          <label for="last_name">Last Name</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" name="email" class="validate" value="<?php echo isset($_POST['email'])? $email : ''; ?>">
          <label for="email">Email</label>
        </div>
        <div class="row">
        
          <div class="input-field col s12">
              
          <input id="subject" type="text" name="subject" class="validate" value="<?php echo isset($_POST['subject'])? $subject : ''; ?>">
          
          <label for="subject">Subject</label>
          
        </div>
      </div>
     
  <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="message" type="text" class="materialize-textarea" name="message"></textarea>
          <label for="textarea1" value="<?php echo isset($_POST['message'])? $message : ''; ?>">Message</label>
        </div>
      </div>
    </form>
  </div>
        
    </form>
    <button class="btn waves-effect waves-light amber" type="submit" name="submit" value="Send">Submit
    </button>
  </div>
</div>

<!-- / form -->

<!-- footer section -->
<footer class="footer-container">
<div class="icon-left">
  <a href="https://www.facebook.com/taylorscustomhomes"><i class="fab fa-facebook"></i></a>
</div>
<div class="center-footer">
  <span class="company-name text">Taylor's Custom Homes &#169; 2021</span>
</div>
<div class="right-footer">

  <a href="tel:205-705-2588">(205)705-2588</a>
</div>
</footer>

</body>
<script src="script.js"></script>
<script src="https://kit.fontawesome.com/83c4326dda.js" crossorigin="anonymous"></script>
</html>