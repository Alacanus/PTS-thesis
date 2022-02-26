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
        redirect_with('createClass4.php', [
            'errors' => $errors,
            'inputs' => $inputs

        ]);
    }

    if(isset($_FILES['imageUpload']) && $_FILES['imageUpload']['size'] > 0){
        replaceclassPic($_SESSION['user_id']);
        $fileDATA=uploadImage($_FILES);
    }else{
        $fileDATA = '';
        $fileDATA['result'] = false;
        $fileID = getclassPic($_SESSION['user_id']);
        
        if(!isset($fileID['fileID'])){
            $fileDATA['filePath'] = placeholderPIC;
        }else{
            $fileDATA['filePath'] = $fileID['filePath'];
        }
        
        $fileDATA['message'] = ' ';
    }
    $_SESSION['post']['fileData'] = $fileDATA;



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
                            $sql1 = "UPDATE classprofile
                            JOIN
                            classes
                            ON classprofile.classID = classes.classID
                            SET classprofile.imageAddress = :imageAddress, classprofile.videoAddress = :videoAddress
                            WHERE classes.userID = :userID AND classes.classID = :classID";
                            db()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $statement = db()->prepare($sql1);
                            $statement->bindParam(':imageAddress', $fileDATA['filePath']);
                            $statement->bindParam(':videoAddress', $status['id']);
                            $statement->bindParam(':userID', $_SESSION['user_id']);
                            $statement->bindParam(':classID', $_SESSION['post']['classID']);
                            if($statement->execute()){
                                $errors['classRooms'] = "Video have been uploaded successfully. check 
                                https://www.youtube.com/embed/" .$status['id'];
                                redirect_with('createClass4.php', [
                                    'errors' => $errors
                                ]);
                            }

                            $_SESSION['videoID'] = $status['id'];
                        }
                    }catch (Google_ServiceException $e) { 
                        //
                        $errors['classRooms'] = sprintf('<p>A service error occurred: <code>%s</code></p>', 
                        htmlspecialchars($e->getMessage())); 
                        redirect_with('createClass4.php', [
                            'errors' => $errors
                        ]);
                    }catch (Google_Exception $e) { 
                        $errors['classRooms'] = sprintf('<p>An client error occurred: <code>%s</code></p>', htmlspecialchars($e->getMessage())); 
                        redirect_with('createClass4.php', [
                            'errors' => $errors
                        ]);
                    }
                    $_SESSION['upload_token'] = $client->getAccessToken(); 
                }

            }else{ 
                $errors['classRooms'] = "Sorry, there was an error uploading your file.";
                redirect_with('createClass4.php', [
                    'errors' => $errors
                ]);

            } 
        }else{
                $errors['classRooms'] = "Sorry, file type not allowed.";
            redirect_with('createClass4.php', [
                'errors' => $errors
            ]);
        }
    }


}else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file
}
