<?php

if (isset($slug) && !empty($_FILES['imgUpload']['name'][0])) {
        $path = 'files/img/' . $slug . '/';
        
        if (!file_exists($path)) {
            mkdir($path);
        }

        $succesUploadCounter = 0;
        $filesCounter = count($_FILES['imgUpload']['name']);

        for ($i = 0; $i < $filesCounter; $i++) {
            $imgName = $_FILES['imgUpload']['name'][$i];
            $imgType = $_FILES['imgUpload']['type'][$i];
            $imgSize = $_FILES['imgUpload']['size'][$i];
            $tmpName = $_FILES['imgUpload']['tmp_name'][$i];
            $fileExtension = explode('.', $imgName);
            $fileExtension = end($fileExtension);
            $imgName = md5(time() . $imgName) . '.' . $fileExtension;
            $uploadPath = $path . $imgName;

            if (move_uploaded_file($tmpName, $uploadPath)) {
                $succesUploadCounter++;

                $imgUploadStmt->bind_param('ss', $uploadPath, $slug);
                $imgUploadStmt->execute();
            }
        }
        echo($succesUploadCounter . " of " . $filesCounter . " files was uploaded successfully");
    }