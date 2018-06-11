<?php
function image_resize($width, $height, $path, $inputName)
{
    list($w,$h)=getimagesize($_FILES[$inputName]['tmp_name']);
    $maxSize=0;
    if(($w>$h)and ($width>$height))
        $maxSize=$width;
    else
        $maxSize=$height;
    $width=$maxSize;
    $height=$maxSize;
    $ration_orig=$w/$h;
    if(1>$ration_orig)
        $width=ceil($height*$ration_orig);
    else
        $height=ceil($width/$ration_orig);
    //отримуємо файл
    $imgString=file_get_contents($_FILES[$inputName]['tmp_name']);
    $image=imagecreatefromstring($imgString);
    //нове зображення
    $tmp=imagecreatetruecolor($width,$height);
    imagecopyresampled($tmp, $image,
        0,0,
        0,0,
        $width, $height,
        $w, $h);
    //Зберегти зображення у файлову систему
    switch($_FILES[$inputName]['type'])
    {
        case 'image/jpeg':
            imagejpeg($tmp,$path,30);
            break;
        case 'image/png':
            imagepng($tmp,$path,0);
            break;
        case 'image/gif':
            imagegif($tmp, $path);
            break;
    }
    return $path;
    //очисчаємо память
    imagedestroy($image);
    imagedestroy($tmp);
}
function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }
    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X',
        mt_rand(0, 65535),
        mt_rand(0, 65535),
        mt_rand(0, 65535),
        mt_rand(16384, 20479),
        mt_rand(32768, 49151),
        mt_rand(0, 65535),
        mt_rand(0, 65535),
        mt_rand(0, 65535));
}