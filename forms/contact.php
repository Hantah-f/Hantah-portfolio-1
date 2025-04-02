<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'brightonomondiumira@gmail.com';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Load the PHP Email Form library
    if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
        include($php_email_form);
    } else {
        die('Unable to load the "PHP Email Form" Library!');
    }

    $contact = new PHP_Email_Form;
    $contact->ajax = true;

    $contact->to = $receiving_email_address;
    $contact->from_name = $_POST['name'] ?? 'No Name'; // Provide a default value if name is not set
    $contact->from_email = $_POST['email'] ?? 'no-reply@example.com'; // Provide a default value if email is not set
    $contact->subject = $_POST['subject'] ?? 'No Subject'; // Provide a default value if subject is not set

    // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
    /*
    $contact->smtp = array(
        'host' => 'example.com',
        'username' => 'example',
        'password' => 'pass',
        'port' => '587'
    );
    */

    // Add messages
    $contact->add_message($_POST['name'] ?? 'No Name', 'From');
    $contact->add_message($_POST['email'] ?? 'no-reply@example.com', 'Email');
    $contact->add_message($_POST['message'] ?? 'No Message', 'Message', 10);

    // Send the email and echo the response
    echo $contact->send();

} else {
    // Optionally handle other request methods (GET, etc.)
    echo "Method not allowed.";
    exit;
}
?>
