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

// include("includedfile.php");

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style type="text/css">
    
        html { 
          background: url(phpbackground2.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
        
        body {
            background: none;
        }

    </style>

    <title>Contact Form!</title>
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
                <br />
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
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