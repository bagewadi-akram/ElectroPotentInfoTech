<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        # verify url, this is for recaptcha V2
        // error_reporting(0);
        // $msg = "";
        $secretKey = "6LfHSKMgAAAAACYgvN9fifALxKPOSIlfUu7MPDDL";
        $responseKey = $_POST['g-recaptcha-response'];

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$responseKey;
        $response = file_get_contents($url);
        $response = json_decode($response);    


        # FIX: Replace this email with recipient email
        // $mail_to = "azam@electropotentinfotech.com";
        
        # Sender Data
        // $subject = trim($_POST["subject"]);
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["name"])));
        // $lastname = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["lastname"])));
        $email = filter_var(trim($_POST["mail"]), FILTER_SANITIZE_EMAIL);
        
      
        // $message = trim($_POST["message"]);
        $subject = trim($_POST["subject"]);
        $phone = trim($_POST["phone"]);

    if ( empty($name) OR empty($subject) OR empty($phone) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($_POST["message"])) {  //OR empty($subject)
        # Set a 400 (bad request) response code and exit.
        // http_response_code(400);
        echo "Please complete the form and try again.";
        exit;
    }

    # Mail Content
    // $content = "Name: $name\n";
    // $content .= "Email: $email\n\n";
    // $content .= "Message:\n$message\n";

    // $subject = "Subject:\n$subject\n";
    // $message = "Message:\n$message\n";
    // $message .= "Message:\n$phone\n";


    // $name = $firstname . " " . $lastname;
    $headers = "From: $name <$email>";
    $message = '
     <h3 align="center">Candidate Details</h3>
         <table border="1" width="100%" cellpadding="5" cellspacing="5">
             <tr>
                 <td width="30%">Name</td>
                 <td width="70%">' . $name . '</td>
             </tr>
             <tr>
                 <td width="30%">Email Address</td>
                 <td width="70%">' . $email . '</td>
             </tr>
             <tr>
                 <td width="30%">Phone Number</td>
                 <td width="70%">' . $phone . '</td>
             </tr>
             <tr>
                 <td width="30%">Message</td>
                 <td width="70%">' . trim($_POST["message"]) . '</td>
             </tr>
         </table>
     ';

    require 'PHPMailerAutoload.php';
    require 'mail_credential.php';

    $mail = new PHPMailer;
            
        // # email headers.
        // $name = $firstname." ".$lastname;
        // $headers = "From: $name <$email>";
    
    // $mail->SMTPDebug = 5;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'bond.herosite.pro';//bond.herosite.pro    smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL;                 // SMTP username
    $mail->Password = PASS;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;//465;587                                    // TCP port to connect to


    $mail->setFrom(EMAIL, "Electropotentinfotech.com");   //('from@example.com', 'Mailer');
    $mail->addAddress('azam@electropotentinfotech.com');//('joe@example.net', 'Joe User');     

// Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo($email);//('info@example.com', 'Information');

    $mail->isHTML(true);                                  // Set email format to HTML


    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->header = $headers;




    if ($response->success) {
        if ($mail->send()) {
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong, we couldn't send your message.";
        }
    } else {
        echo "Recaptcha Verification Failed.";
    }

        // old mail code starts
        # Send the email.
        // $success = mail($mail_to, $subject, $message, $headers); 
        // if ($success) {
        //     # Set a 200 (okay) response code.
        //     http_response_code(200);
        //     echo "Thank You! Your message has been sent.";
        // } else {
        //     # Set a 500 (internal server error) response code.
        //     http_response_code(500);
        //     echo "Oops! Something went wrong, we couldn't send your message.";
        // }
        // old mail code ends

    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
        }

?>
