# PHP-Email-Template-Parser-Class

This is a very basic PHP Class to Parse variables in a template for use as an HTML Email.

The file `demo.php` is commented and pretty self explanatory on how to use the PHP Class however I will also explain it here.

**There are 2 sources for your HTML Template.**

1. External Template file which will be included and parsed.


1. Inline Template saved and stored as a String in a PHP variable.


I will show the usage for both versions below...


----------
## External Template File Method ##

**email-template.tpl**

    <html>
    <body>
    <h1>Account Details Using External Template File</h1>
    <p>Thank you for registering on our site, your account details are as follows:<br>
    Username: {{username}}<br>
    Password: {{password}} </p>
    </body>
    </html>

**demo.php**

    <?php
    require('emailTemplateParser.php');

    // Set the file path to our external Template File.
    $emailTemplate = 'email-template.tpl';

    // Assign our replacement VALUES to a matching KEY where the KEY
    // is the Variable Placeholder name used in the Template file!
    $emailValues = array(
    'username' => 'My username value here',
    'password' => 'My password'
    );

    // Instantiate our Email Template Parser Class
    // Passing in the Template file path and variable replacement
    // ARRAY as well as a TRUE flag to indicate that this Template is
    // being loaded from an External file and not an Inline string of HTML.
    $emailHtml = new EmailTemplateParser($emailValues, $emailTemplate, true);

    // Print the Parsed Email Template to the screen.  Our Variable
    // placeholders in the template are now parsed with real values!
    echo $emailHtml->output();




----------


## Inline Template Method ##



**demo.php**

    <?php
    require('emailTemplateParser.php');

    // HTML Template saved to the PHP $emailTemplateInline variable
    // instead of an external Template File!.
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

    // Assign our replacement VALUES to a matching KEY where the KEY
    // is the Variable Placeholder name used in the Template string!
    $emailValues = array(
    'username' => 'My username value here',
    'password' => 'My password'
    );

    // Instantiate our Email Template Parser Class
    // Passing in the Template file path and variable replacement
    // ARRAY as well as a FALSE flag to indicate that this Template is
    // being loaded from a PHP Variable instead of an External file.
    // Please note that the FALSE flag is set by default and is not required!
    $emailHtml = new EmailTemplateParser($emailValues, $emailTemplateInline, false);

    // Print the Parsed Email Template to the screen.  Our Variable
    // placeholders in the template are now parsed with real values!
    echo $emailHtml->output();


----------


## Other Info ##

That pretty much sums up the current usage until I or you add to the current functionality and features.

Please feel free to send **pull request** or submit **issues** if they arise.  This was a quick and dirty little project thrown together to fix a need on another project in a night!

Feel free to visit my [Web Development Blog](http://www.codedevelopr.com "Web Development Blog") -  [http://www.CodeDevelopr.com](http://www.codedevelopr.com "Web Development Blog")

or

Check out my
[Web Development and Marketing Studio](https://www.apollowebstudio.com "Web Development and Marketing Studio") -  [https://www.ApolloWebStudio.com](https://www.apollowebstudio.com "Web Development and Marketing Studio")

Follow me on Twitter
[@JasonDavisFL](http://twitter.com/#!/JasonDavisFL "@JasonDavisFL on Twitter")



