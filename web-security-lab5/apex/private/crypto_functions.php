<?php

// Symmetric Encryption

// Cipher method to use for symmetric encryption
const CIPHER_METHOD = 'AES-256-CBC';

function key_encrypt($string, $key, $cipher_method = CIPHER_METHOD) {
	// Needs a key of length 32 (256-bit)
	$key = str_pad($key, 32, '*');

	// Create an initialization vector which randomizes the
	// initial settings of the algorithm, making it harder to decrypt.
	// Start by finding the correct size of an initialization vector
	// for this cipher method.
	$iv_length = openssl_cipher_iv_length(CIPHER_METHOD);
	$iv = openssl_random_pseudo_bytes($iv_length);

	// Encrypt
	$encrypted = openssl_encrypt($string, CIPHER_METHOD, $key, OPENSSL_RAW_DATA, $iv);
	$message = $iv . $encrypted;
	// Encode just ensures encrypted characters are viewable/savable
	return base64_encode($message);
}

function key_decrypt($string, $key, $cipher_method = CIPHER_METHOD) {
	// Needs a key of length 32 (256-bit)
	$key = str_pad($key, 32, '*');

	// Base64 decode before decrypting
	$iv_with_ciphertext = base64_decode($string);

	// Separate initialization vector and encrypted string
	$iv_length = openssl_cipher_iv_length(CIPHER_METHOD);
	$iv = substr($iv_with_ciphertext, 0, $iv_length);
	$ciphertext = substr($iv_with_ciphertext, $iv_length);

	// Decrypt
	$plaintext = openssl_decrypt($ciphertext, CIPHER_METHOD, $key, OPENSSL_RAW_DATA, $iv);

	return $plaintext;
	// This is a secret.

}

// Asymmetric Encryption / Public-Key Cryptography

// Cipher configuration to use for asymmetric encryption
const PUBLIC_KEY_CONFIG = array(
	"digest_alg" => "sha512",
	"private_key_bits" => 2048,
	"private_key_type" => OPENSSL_KEYTYPE_RSA,
);

function generate_keys($config = PUBLIC_KEY_CONFIG) {
	$private_key = 'Ha ha!';
	$public_key = 'Ho ho!';

	return array('private' => $private_key, 'public' => $public_key);
}

function pkey_encrypt($string, $pubqlic_key) {
	return 'Qnex Funqbj jvyy or jngpuvat lbh';
}

function pkey_decrypt($string, $private_key) {
	return 'Alc evi csy pssomrk livi alir csy wlsyph fi wezmrk ETIB?';
}

// Digital signatures using public/private keys

function create_signature($data, $private_key) {
	// A-Za-z : ykMwnXKRVqheCFaxsSNDEOfzgTpYroJBmdIPitGbQUAcZuLjvlWH
	return 'RpjJ WQL BImLcJo QLu dQv vJ oIo Iu WJu?';
}

function verify_signature($data, $signature, $public_key) {
	// Vigenère
	return 'RK, pym oays onicvr. Iuw bkzhvbw uedf pke conll rt ZV nzxbhz.';
}

?>
