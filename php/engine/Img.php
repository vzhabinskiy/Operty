<?php

class Img
{
    public function insertPhoto()
    {
        $status = true;
        $errors = [];
        $folder = "../../source/img";
        $currentSrc = '';
        if (empty($_FILES['img']['type'])) {
            $status = false;
            $errors = ["error" => "File not found"];
        } else {
            $tmp = $_FILES['img']["tmp_name"];
            $realName = $_FILES['img']["name"]; 
            $realName = time() . '_' . $realName;
            $allowedTypes = ["image/jpeg", "image/pjpeg", "image/png", "image/svg", "image/jpg"]; 
            if (is_uploaded_file($tmp)) {
                $fileInfo = finfo_open(FILEINFO_MIME_TYPE); 
                $fileMimeType = finfo_file($fileInfo, $tmp); 
                if (!in_array($fileMimeType, $allowedTypes)) {
                    $status = false;
                    $errors = ["error" => "File wrong type"];
                } else {
                    $currentSrc = $folder . '/' . $realName; 
                    move_uploaded_file($tmp, $currentSrc);
                    $currentSrc = '/source/img/' . $realName; 
                }
            }
            finfo_close($fileInfo);
        }
        return ['status' => $status, 'message' => $errors, 'path' => $currentSrc];
    }

    public function updatePhoto($oldPath)
    {
        if (!empty($_FILES['img']['type'])) {
            unlink('../..' . $oldPath);
        }
        return $this->insertPhoto();
    }
}
