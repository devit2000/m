<?php
function imageResize($imageResourceId, $width, $height)
{
    $targetWidth = $width / 10;
    $targetHeight = $height / 10;
    $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
    imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
    return $targetLayer;
}

function createThumbnail($imageType, $file, $sourceProperty0, $sourceProperty1, $folderPath, $fileNewName, $ext)
{
    switch ($imageType) {
        case IMAGETYPE_PNG:
            $imageResourceId = imagecreatefrompng($file);
            $targetLayer = imageResize($imageResourceId, $sourceProperty0, $sourceProperty1);
            imagepng($targetLayer, $folderPath . "/thumbnail/" . $fileNewName);
            break;
        case IMAGETYPE_GIF:
            $imageResourceId = imagecreatefromgif($file);
            $targetLayer = imageResize($imageResourceId, $sourceProperty0, $sourceProperty1);
            imagegif($targetLayer, $folderPath . "/thumbnail/" . $fileNewName);
            break;
        case IMAGETYPE_JPEG:
            $imageResourceId = imagecreatefromjpeg($file);
            $targetLayer = imageResize($imageResourceId, $sourceProperty0, $sourceProperty1);
            imagejpeg($targetLayer, $folderPath . "/thumbnail/" . $fileNewName);
            break;
        default:
            echo "Invalid Image type.";
            exit;
    }
    move_uploaded_file($file, $folderPath . $fileNewName);
}
