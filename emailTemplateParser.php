<?php

/**
 * Email Template Parser
 *
 * Create HTML email body while replacing variable placeholders with content using a PHP Array.
 * @package
 * @author Jason Davis
 * @version 1.0
 * @copyright 2015
 */
class EmailTemplateParser{

    protected $_openingTag = '{{';
    protected $_closingTag = '}}';
    protected $_emailValues;
    protected $_emailTemplate;


    /**
     * Email Template Parser Class.
     * @param string $emailTemplate HTML template string OR File path to a Email Template file.
     */
    public function __construct($emailTemplate) {
        $this->_setTemplate($emailTemplate);
    }


    /**
     * Set Template File or String.
     * @param string $emailTemplate HTML template string OR File path to a Email Template file.
     */
    protected  function _setTemplate($emailTemplate) {

        try
        {
            // Template HTML is stored in a File
            if(file_exists($emailTemplate)){
                $this->_emailTemplate = file_get_contents($emailTemplate);
            // Template HTML is stored in-line in the $emailTemplate property!
            }else if(is_string($emailTemplate)){
                $this->_emailTemplate = $emailTemplate;
            }else{
                throw new Exception('ERROR: Invalid Email Template.  $emailTemplate must be a String or else a FilePath');
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage(). ' | FILE: '.$e->getFile(). ' | LINE: '.$e->getLine();
        }

    }


    /**
     * Set Variable name and values one by one or at once with an array.
     * @param string $var_name  Variable name that will be replaced in the Template.
     * @param string $var_value The value for a variable/key.
     */
    public function setVar($var_name, $var_value){

        try
        {
            // If a key and value are passed in, add it to our $_emailValues Array
           if(isset($var_name) && $var_name != '' & isset($var_value) && $var_value != ''){
                $this->_emailValues[$var_name] = $var_value;
           }else{
                throw new Exception('ERROR: Template Variable KEY and VALUE must be a string and not be empty');
           }
        }
        catch(Exception $e)
        {
            echo $e->getMessage(). ' | FILE: '.$e->getFile(). ' | LINE: '.$e->getLine();
        }
    }


    /**
     * Set Variable name and values with an array.
     * @param array $var_array  Array of key=>values.
     */
    public function setVars(array $var_array){

        try
        {
            if(is_array($var_array)){
                foreach ($var_array as $key => $value) {
                    $this->_emailValues[$key] = $value;
                }
            }else{
                throw new Exception('ERROR: Must be an ARRAY.');
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage(). ' | FILE: '.$e->getFile(). ' | LINE: '.$e->getLine();
        }
    }


    /**
     * Returns the Parsed Email Template.
     * @return string HTML with any matching variables {{varName}} replaced with there values.
     */
    public function output() {

        $html = $this->_emailTemplate;
        foreach ($this->_emailValues as $key => $value) {
            if(isset($value) && $value != ''){
                $html = str_replace($this->_openingTag . $key . $this->_closingTag, $value, $html);
            }
        }
        return $html;
    }

}