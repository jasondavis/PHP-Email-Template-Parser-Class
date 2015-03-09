<?php

require('emailTemplateParser.php');

/**
 * Demo usage of Email Template Parser Class
 * @param array $emailValues PHP Array where the KEY is the Variable name in the template and the VALUE is the replacement value.
 * @param string $emailTemplate File path to a Email Template file.
 * @return string HTML with any matching variables {{varName}} replaced with there values.
 */
$emailTemplate =  'email-template.tpl';

$emailValues = array(
    'username' => 'My username value here',
    'password' => ''
);

$emailHtml = new EmailTemplateParser($emailValues, $emailTemplate, true);
echo $emailHtml->output();




//////////////////////////////////////////////////////////////////


/**
 * Demo usage of Email Template Parser Class
 * @param array $emailValues PHP Array where the KEY is the Variable name in the template and the VALUE is the replacement value.
 * @param string $emailTemplate Email Template HTML as a String.
 * @return string HTML with any matching variables {{varName}} replaced with there values.
 */

$emailTemplateInline = <<<HTML
<html>
<body>
<h1>Account Details Using Inline Template</h1>
<p>Thank you for registering on our site, your account details are as follows:<br>
Username: {{username}}<br>
Password: {{password}} </p>
</body>
</html>
HTML;

$emailValues = array(
    'username' => 'My username value here',
    'password' => ''
);


$emailHtml = new EmailTemplateParser($emailValues, $emailTemplateInline, false);
echo $emailHtml->output();
