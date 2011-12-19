<?php
class Resume {
    public $uid = 0;
    public $firstname = '';
    public $lastname = '';
    public $address = '';
    public $city = '';
    public $state = '';
    public $zip = 0;
    public $phone = '';
    public $email = '';
    public $company = array();
    public $school = array();
    public $awards = array();
    public $skills = array();
    
  function  __construct($uid) {
        $this->uid = $uid;
    }
    
 function buildResume($format)
 {


// Turn off WSDL caching
ini_set ('soap.wsdl_cache_enabled', 0);

// Define credentials for LD
define ('USERNAME', 'rsimha01');
define ('PASSWORD', 'prannu35');

// SOAP WSDL endpoint
define ('ENDPOINT', 'https://api.livedocx.com/1.2/mailmerge.asmx?WSDL');

// Define timezone
date_default_timezone_set('Europe/Berlin');

// -----------------------------------------------------------------------------

//
// SAMPLE #1 - License Agreement
//



// Instantiate SOAP object and log into LiveDocx

$soap = new SoapClient(ENDPOINT);

$soap->LogIn(
    array(
        'username' => USERNAME,
        'password' => PASSWORD
    )
);

// Upload template

$data = file_get_contents('template.docx');

$soap->SetLocalTemplate(
    array(
        'template' => base64_encode($data),
        'format'   => 'docx'
    )
);

// Assign data to template


$fieldValues = array (
    'first_name' => $this->firstname,
    'last_name' => $this->lastname,
    'street_name'  => $this->address,
    'city'     => $this->city,
    'state'     => $this->state,
    'zip'     => $this->zip,
    'phone_no'  => $this->phone,
         'email'  => $this->email,
    'company_name' => $this->company['company_name'],
    'years' => $this->company['years'],
    'job_title' => $this->company['job_title'],
    'job_description' => $this->company['job_description'],
    'degree' => $this->school['degree'],
'school' => $this->school['school'],
    'school_dates' => $this->school['dates'],
    'skills' => $this->skills[0]

    );

$soap->SetFieldValues(
    array (
        'fieldValues' => $this->assocArrayToArrayOfArrayOfString($fieldValues)
    )
);

// Build the document

$soap->CreateDocument();

// Get document as PDF

$result = $soap->RetrieveDocument(
    array(
        'format' => $format
    )
);

$data = $result->RetrieveDocumentResult;

file_put_contents('resume.'.$format.'', base64_decode($data));

return "resume.".$format;


$soap->LogOut();

unset($soap);

print('DONE.' . PHP_EOL);

 }

/**
 * Convert a PHP assoc array to a SOAP array of array of string
 *
 * @param array $assoc
 * @return array
 */
function assocArrayToArrayOfArrayOfString ($assoc)
{
    $arrayKeys   = array_keys($assoc);
    $arrayValues = array_values($assoc);

    return array ($arrayKeys, $arrayValues);
}

/**
 * Convert a PHP multi-depth assoc array to a SOAP array of array of array of string
 *
 * @param array $multi
 * @return array
 */
function multiAssocArrayToArrayOfArrayOfString ($multi)
{
    $arrayKeys   = array_keys($multi[0]);
    $arrayValues = array();

    foreach ($multi as $v) {
        $arrayValues[] = array_values($v);
    }

    $_arrayKeys = array();
    $_arrayKeys[0] = $arrayKeys;

    return array_merge($_arrayKeys, $arrayValues);
}
 
 }



?>
