<?php
function generate_Public_Key($privateKey){
    $salt = openssl_random_pseudo_bytes(12);
    $keyLength = 40;
    $iterations = 10000;//NIST recommendation at least 10,000.
    $generated_key = openssl_pbkdf2($privateKey, $salt, $keyLength, $iterations, 'sha256');
    //native Password-Based Key Derivation Function of the Openssl, more secure than has
    return $generated_key;
} 
$privateKey = generate_Public_Key('PTS-th3s!s');

function encrypt0($plaintext, $password = 'elder ring', $privateKey = null) {
    $method = openssl_get_cipher_methods()[23];
    $key = isset($privateKey) ? $privateKey : hash('sha256', $password, true);
    $iv_size = openssl_cipher_iv_length($method); 
    $iv = openssl_random_pseudo_bytes($iv_size); // Generate an initialization vector
    $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
    $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);
    //iv only 16bits based on iv size, hash return binary 16bits, cipher unknown 
    return bin2hex($iv . $hash . $ciphertext);
}

function decrypt0($ivHashCiphertext, $password = 'elder ring', $privateKey = null) {
    $ivHashCiphertext2 = hex2bin($ivHashCiphertext);
    $method = openssl_get_cipher_methods()[23];
    $iv = substr($ivHashCiphertext2, 0, 16);
    $hash = substr($ivHashCiphertext2, 16, 32);
    $ciphertext = substr($ivHashCiphertext2, 48);
    //option to use a better encryption key 
    $key = isset($privateKey) ? $privateKey : hash('sha256', $password, true);
    //if cipher structure match try decrypt
    if (!hash_equals(hash_hmac('sha256', $ciphertext . $iv, $key, true), $hash)) return null;

    return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
}