<?php

$error = "";
$successMessage = "";

if ($_POST) {
    
    if ($_POST["email_address"] && !filter_var($_POST["email_address"], FILTER_VALIDATE_EMAIL)) {
        $error .= "The email address is invalid.<br>";
    }
    
    if (!$_POST["email_address"]) {
        $error .= "An email address is required.<br>";
    }
    
    if (!$_POST["subject"]) {
        $error .= "A subject is required.<br>";
    }
    
    if (!$_POST["question"]) {
        $error .= "A question is required.<br>";
    }
    
    if ($error != "") {
            
            $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' . $error . '</div>';
            
        } else {
            
            $emailTo = $_POST["email_address"];

            $subject = $_POST["subject"];
            
            $body = $_POST["question"];
            
            $headers = "From: noreply@tommyschmid.com";
            
            if (mail($emailTo, $subject, $body, $headers)) {
                
                $successMessage = '<div class="alert alert-success" role="alert">Your message was successfully sent.</div>';
                
            } else {
             
                $error = '<div class="alert alert-danger" role="alert">Your message could not be sent.</div>';
                
            }
        }
}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Contact Form</title>
  </head>
  <body>
     <div class="container">
    <h1>Get in touch!</h1>
    
    <div id="error"><? echo $error.$successMessage; ?></div>
    
<form method="post">
    <div class="form-group">
        <div>
            <label>Email Address</label>
            <input name="email_address" type="text" id="email" class="form-control">
        </div>
        <br />
        <div>
            <label>Subject</label>
            <input name="subject" type="text" id="subject" class="form-control">
        </div>
        <br />
        <div>
            <label>What would you like to ask us?</label>
            <textarea name="question" type="area" class="form-control" id="question" rows="3"></textarea>
        </div>
    </div>
    
    <button type="submit" id="submit" class="btn-primary">Submit</button>
</form>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
<script type="text/javascript">
    
    $("form").submit(function(e) {
        
        var error = "";
        
        if ($("#email").val() == "") {
            
            error += 'The email field is required.<br>';
            
        }
        
        if ($("#subject").val() == "") {
            
            error += 'The subject field is required.<br>';
            
        }
        
        if ($("#question").val() == "") {
            
            error += 'The question field is required.';
            
        }
        
        if (error != "") {
            
            $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
            
            return false;
            
        } else {
            
            return true;
            
        }
    });
    
</script>
  
  
  
  </body>
</html>