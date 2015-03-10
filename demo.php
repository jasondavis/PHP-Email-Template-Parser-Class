<?php
require('emailTemplateParser.php');

/**
 * Demo usage of Email Template Parser Class
 * @param array $emailValues PHP Array where the KEY is the Variable name in the template and the VALUE is the replacement value.
 * @param string $emailTemplate File path to a Email Template file.
 * @return string HTML with any matching variables {{varName}} replaced with there values.
 */
$emailTemplate =  'email-template.tpl';

$emailHtml = new EmailTemplateParser($emailTemplate);

$emailHtml->setVar('username', 'JasonDavis');
$emailHtml->setVar('password', 'hfgjhfghsh');

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
    'password' => 'my pass'
);

$emailHtml = new EmailTemplateParser($emailTemplateInline);

$emailHtml->setVars($emailValues);

echo $emailHtml->output();

//////////////////////////////////////////////////////////////////

/**
 * Demo usage of Email Template Parser Class
 * @param array $emailValues PHP Array where the KEY is the Variable name in the template and the VALUE is the replacement value.
 * @param string $emailTemplate File path to a Email Template file p-assed into constructor.
 * @return string HTML with any matching variables {{varName}} replaced with there values.
 */

$emailHtml = new EmailTemplateParser('email-template.tpl');

$emailHtml->setVars(array(
    'username' => 'My username value here',
    'password' => 'ghjghghkhjk'
));

echo $emailHtml->output();
