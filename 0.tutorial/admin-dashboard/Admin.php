<?php

namespace AdminDashboard;

class Admin
{
    protected function redirect($url)
    {
        $protocol = strpos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
        header('location: ' . $protocol . $_SERVER['HTTP_HOST'] . '/PHPTuto/0.tutorial/' . $url);
    }

    protected function redirectBack()
    {
        header("location :" . $_SERVER['HTTP_REFERER']);
    }

    protected function saveImage($image, $imagePath, $imageName = NULL)
    {
        if ($imageName)
            $imageName = $imageName . '.' . substr($image['type'], 6, strlen($image['type']));
        else
            $imageName = date("Y-m-d-H-i-s") . '.' . substr($image['type'], 6, strlen($image['type']));
        $imageTemp = $image['tmp_name'];
        $imagePath = "public/" . $imagePath . '/';
        if (is_uploaded_file($imageTemp)) {
            if (move_uploaded_file($imageTemp, $imagePath . $imageName))
                return $imagePath . $imageName;
            else
                return false;
        } else
            return false;
    }

    protected function removeImage($path)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/PHPTuto/0.tutorial/' . $path;
        unlink($path);
    }
}