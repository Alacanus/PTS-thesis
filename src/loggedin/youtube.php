<?php
$inputs = [];
$errors = [];

if (is_post_request()){

    [$inputs, $errors] = filter($_POST, [
        'title' => 'string | required | between: 3, 255',
        'description' => 'string | required | between: 3, 255',
        'tags' => 'string | required | between: 3, 255',


    ]);
    

    if ($errors) {
        redirect_with('Youtube_upload.php', [
            'errors' => $errors,
            'inputs' => $inputs

        ]);
    }


    if(isset($_FILES['videoFile'])){
        $fileSize = $_FILES['videoFile']['size']; 
        $fileType = $_FILES['videoFile']['type']; 
        $target_dir = realpath(dirname(__FILE__)).'/../../public/Writable/';
        $targetFile = $target_dir . basename($_FILES ["videoFile"]["tmp_name"]);
        $allowedTypeArr = array("video/mp4", "video/avi", "video/mpeg", "video/mpg", "video/mov", "video/wmv", "video/rm"); 
        if(in_array($fileType, $allowedTypeArr)){
            if(move_uploaded_file($_FILES["videoFile"]["tmp_name"], $targetFile)) { 
                $videoFilePath = $targetFile; 
                $result = insert_vidData($inputs['title'], $inputs['description'], $inputs['tags'], $videoFilePath);
                $client = init_Client();
                $youtube = new Google_Service_YouTube($client);

                if($client->getAccessToken()){
                    try{
                        $videoPath = $result['vidPath'];
                        $snippet = new Google_Service_YouTube_VideoSnippet();
                        $snippet->setTitle($result['vidTitle']); 
                        $snippet->setDescription($result['vidDesc']); 
                        // $youtubeServ->setTags(explode(",",$result['vidTags']));
                        $snippet->setTags($result['vidTags']);
                        $snippet->setCategoryId("22"); 
                        $status = new Google_Service_YouTube_VideoStatus(); 
                        $status->privacyStatus = "unlisted"; 
                        $video = new Google_Service_YouTube_Video(); 
                        $video->setSnippet($snippet); 
                        $video->setStatus($status); 
                        $chunkSizeBytes = 1 * 1024 * 1024; //recommended idk->this guide said lower val better on unreliable conn
                        $client->setDefer(true);//callback
                        $insertRequest = $youtube->videos->insert("status,snippet", $video); 
                        $media = new Google_Http_MediaFileUpload( 
                            $client, 
                            $insertRequest, 
                            'video/*', 
                            null, 
                            true, 
                            $chunkSizeBytes 
                        );// google upload object function
                        $media->setFileSize(filesize($videoPath));
                        //upload fopen()
                        $status = false; 
                        $handle = fopen($videoPath, "rb"); 
                        while (!$status && !feof($handle)) {//while url is open send chunks
                            $chunk = fread($handle, $chunkSizeBytes); 
                            $status = $media->nextChunk($chunk); 
                        } 
                        fclose($handle); 
                        $client->setDefer(false);
                        update_vidData($result['vidID'], $status['id']);
                        if(unlink($result['vidPath'])){
                            $errors['Youtube'] = "Video have been uploaded successfully. check 
                            https://www.youtube.com/embed/" .$status['id'];
                            redirect_with('youtube_upload.php', [
                                'errors' => $errors
                            ]);
                            $_SESSION['videoID'] = $status['id'];
                        }
                    }catch (Google_ServiceException $e) { 
                        //
                        $errors['Youtube'] = sprintf('<p>A service error occurred: <code>%s</code></p>', 
                        htmlspecialchars($e->getMessage())); 
                        redirect_with('youtube_upload.php', [
                            'errors' => $errors
                        ]);
                    }catch (Google_Exception $e) { 
                        $errors['Youtube'] = sprintf('<p>An client error occurred: <code>%s</code></p>', htmlspecialchars($e->getMessage())); 
                        redirect_with('youtube_upload.php', [
                            'errors' => $errors
                        ]);
                    }
                    $_SESSION['upload_token'] = $client->getAccessToken(); 
                }else{
                    // $authUrl = $client->createAuthUrl();
                    // redirect_to($authUrl);
                        // $errors['Youtube'] = "Please click on authorize button bellow";
                        // redirect_with('Youtube_upload.php', [
                        //     'errors' => $errors
                        // ]);

                }

            }else{ 
                $errors['Youtube'] = "Sorry, there was an error uploading your file.";
                redirect_with('Youtube_upload.php', [
                    'errors' => $errors
                ]);

            } 
        }else{
                $errors['Youtube'] = "Sorry, file type not allowed.";
            redirect_with('Youtube_upload.php', [
                'errors' => $errors
            ]);
        }
    }


}else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file
}
