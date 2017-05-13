<?php

/**
 * Generates 11 character Base64 ID
 * @see https://en.wikipedia.org/wiki/Base64#URL_applications
 *
 * @return string Creates 
 */
function newBase64Id() {
    return rtrim(strtr(base64_encode(openssl_random_pseudo_bytes(9)), '+/', '-_'), '=');
}

/**
 * Checks if the string has the format of a valid ID
 *
 * @param  string $id The string to be validated
 * @return bool       Whether string has the correct ID format
 */
function validBase64Id($id) {
    return (bool) preg_match('/^[A-Za-z0-9\-_]{12}$/', $id);
}
