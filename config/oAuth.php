<?php
if (!isset($_SESSION)) { session_start();}

function getOAuthCredentialsFile()
{
  // oauth2 creds
  $oauth_creds = __DIR__ . '/oauth-credentials.json';

  if (file_exists($oauth_creds)) {
    return $oauth_creds;
  }

  return false;
}


function init_Client(){
  if (!$oauth_credentials = getOAuthCredentialsFile()) {
    echo 'missingOAuth2CredentialsWarning';
    return;
  }
  /************************************************
   * The redirect URI is to the current page, e.g:
   * http://localhost:8080/simple-file-upload.php
   ************************************************/
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  if (!isset($client)) { $client = new Google\Client();}
  $client->setAuthConfig($oauth_credentials);
  $client->setRedirectUri($redirect_uri);
  $client->setScopes(Google_Service_Calendar::CALENDAR); // convert to function
  $client->addScope("https://www.googleapis.com/auth/youtube"); // convert to function

  /************************************************
   * If we have a code back from the OAuth 2.0 flow,
   * we need to exchange that with the
   * Google\Client::fetchAccessTokenWithAuthCode()
   * function. We store the resultant access token
   * bundle in the session, and redirect to ourself.
   ************************************************/
  if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // store in the session also
    $_SESSION['upload_token'] = $token;

    // redirect back to the example
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  }

  // set the access token as part of the client
  if (!empty($_SESSION['upload_token'])) {
    $client->setAccessToken($_SESSION['upload_token']);
    if ($client->isAccessTokenExpired()) {
      unset($_SESSION['upload_token']);
      // $_SESSION['upload_token'] = 'no accesstoken';
    }
  } else {
    $authUrl = $client->createAuthUrl();
    $_SESSION['authUrl'] = $authUrl;
  }
  return $client;
  
}

/************************************************
 * If we're signed in then lets try to upload our
 * file. For larger files, see fileupload.php.
 ************************************************/
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && $client->getAccessToken()) {
//   // We'll setup an empty 1MB file to upload.
//   DEFINE("TESTFILE", 'testfile-small.txt');
//   if (!file_exists(TESTFILE)) {
//     $fh = fopen(TESTFILE, 'w');
//     fseek($fh, 1024 * 1024);
//     fwrite($fh, "!", 1);
//     fclose($fh);
//   }

//   // This is uploading a file directly, with no metadata associated.
//   $file = new Google\Service\Drive\DriveFile();
//   $result = $service->files->create(
//       $file,
//       array(
//         'data' => file_get_contents(TESTFILE),
//         'mimeType' => 'application/octet-stream',
//         'uploadType' => 'media'
//       )
//   );

//   // Now lets try and send the metadata as well using multipart!
//   $file = new Google\Service\Drive\DriveFile();
//   $file->setName("Hello World!");
//   $result2 = $service->files->create(
//       $file,
//       array(
//         'data' => file_get_contents(TESTFILE),
//         'mimeType' => 'application/octet-stream',
//         'uploadType' => 'multipart'
//       )
//   );
// }

function init_Cal_Client(){
  if (!$oauth_credentials = getOAuthCredentialsFile()) {
    echo 'missingOAuth2CredentialsWarning';
    return;
  }
  /************************************************
   * The redirect URI is to the current page, e.g:
   * http://localhost:8080/simple-file-upload.php
   ************************************************/
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  $client = new Google\Client();
  $client->setAuthConfig($oauth_credentials);
  $client->setRedirectUri($redirect_uri);
  // $client->setScopes('https://www.googleapis.com/auth/calendar'); // convert to function
  $client->setScopes(Google_Service_Calendar::CALENDAR); // convert to function
  $client->addScope("https://www.googleapis.com/auth/youtube"); // convert to function

  return $client;
  
}