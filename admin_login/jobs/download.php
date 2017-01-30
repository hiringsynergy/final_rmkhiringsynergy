<?php


if(isset($_GET['file'])  && isset($_SESSION['user_role'])=='admin' ) {


    $id = $_GET['file'];

    include "../connect.php";


    $query = "SELECT * FROM company_list WHERE company_id={$id}";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $filename = $row['company_presentation'];



    if(!empty($filename)){
        // Specify file path.
        $path = '../../presentation/'; // '/uplods/'
        $download_file =  $path.$filename;
        // Check file is exists on given path.
        if(file_exists($download_file))
        {
            // Getting file extension.
            $extension = explode('.',$filename);
            $extension = $extension[count($extension)-1];
            // For Gecko browsers
            header('Content-Transfer-Encoding: binary');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($path)) . ' GMT');
            // Supports for download resume
            header('Accept-Ranges: bytes');
            // Calculate File size
            header('Content-Length: ' . filesize($download_file));
            header('Content-Encoding: none');
            // Change the mime type if the file is not PDF
            header('Content-Type: application/'.$extension);
            // Make the browser display the Save As dialog
            header('Content-Disposition: attachment; filename=' . $filename);
            readfile($download_file);
            exit;
        }
        else
        {
            echo 'File does not exists on given path';
        }
}







}

