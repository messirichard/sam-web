<?php
	header("Access-Control-Allow-Origin: null");
	require_once('config.php');
    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove MORALspace.
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

        // Check that data was sent to the mailer.
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            //http_response_code(400);
            echo "Please enter valid email address.";
            exit;
        }

		try {
			SubscribeEmail($email);
			echo "Thank You for your subscription!";
		} catch (Exception $e) {
			echo "Thank You for your subscription!";
		}
		
    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        //http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
