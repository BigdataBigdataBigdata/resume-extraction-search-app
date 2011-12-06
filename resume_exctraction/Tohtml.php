

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
// Turn up error reporting
error_reporting (E_ALL|E_STRICT);

// Turn off WSDL caching
ini_set ('soap.wsdl_cache_enabled', 0);

// Define credentials for LD
define ('USERNAME', 'yourUsername');
define ('PASSWORD', 'yourPassword');

// SOAP WSDL endpoint
define ('ENDPOINT', 'https://api.livedocx.com/1.2/mailmerge.asmx?WSDL');

// Define timezone
date_default_timezone_set('Europe/Berlin');

// -----------------------------------------------------------------------------

//
// SAMPLE #1 - License Agreement
//

print('Starting sample #1 (license-agreement)...');

// Instantiate SOAP object and log into LiveDocx

$soap = new SoapClient(ENDPOINT);

$soap->LogIn(
    array(
        'username' => rsimha01,
        'password' => prannu35
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





// Build the document

$soap->CreateDocument();

// Get document as PDF

$result = $soap->RetrieveDocument(
    array(
        'format' => 'html'
    )
);
$data = $result->RetrieveDocumentResult;

file_put_contents('resume.html', base64_decode($data));

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

        ?>






    </body>
</html>


