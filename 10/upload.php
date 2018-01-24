<?php

//var_dump($_FILES['failas']);
$file = $_FILES['failas'];
echo pathinfo($file['name'],PATHINFO_EXTENSION);

if(move_uploaded_file($file['tmp_name'], 'data/'.$file['name'])){
   echo 'Sekmingai ikelete.';
} else {
    echo 'Nepavyko.';
}

//$str = str_replace(" ", "_", $str);


/**
 * Check that given string only uses Latin characters, digits, and punctuation
 *
 * @resource http://mamchenkov.net/wordpress/2011/08/18/php-regular-expression-to-match-englishlatin-characters-only/
 *
 * @param string $string String to validate
 * @return boolean True if Latin only, false otherwise
 */
public function validateLatin($string) {
    $result = false;

    if (preg_match("/^[\w\d\s.,-]*$/", $string)) {
        $result = true;
    }

    return $result;
}
