<?php
    

    if (isset($_POST['submit']) && isset($_FILES['video'])) 

    {
        
        include "../db_connection.php";
        
        $video_name = $_FILES['video']['name'];
        $tmp_name = $_FILES['video']['tmp_name'];
        $error = $_FILES['video']['error'];

        if($error === 0){

            $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

            $video_ex_lc = strtolower($video_ex);

            $allowed_exs = array("mp4", 'webm', 'avi', 'flv');

            if(in_array($video_ex_lc, $allowed_exs))
            {
                $new_video_name = uniqid("video-", true). '.' . $video_ex_lc; 

                $video_upload_path = 'videos/'. $new_video_name;

                move_uploaded_file($tmp_name, $video_upload_path);

                //insert into database 

                $sql = "INSERT INTO videos(video_url) VALUES('$new_video_name')";
                mysqli_query($conn, $sql);

                header("Location: User_interface/UploadedVideos.php");
            }
            else{
                $em = "You can't upload files of this type";
                header("Location: ../brgyadmin/video.php?error=$em");
            }
        }
        
    }
    else {
        header("Location: ../brgyadmin/video.php");
    }





?>