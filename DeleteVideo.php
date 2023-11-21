<?php
    require_once('db_connection.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Retrieve the video URL from the database
        $sql = "SELECT video_url FROM videos WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $video_url = $row['video_url'];

            // Delete the database entry
            $sql_delete = "DELETE FROM videos WHERE id = $id";
            $result_delete = $conn->query($sql_delete);

            if ($result_delete) {
                // Path to the video directory
                $videoDirectory = "../videos/";

                // Construct the video file path
                $videoFilePath = $videoDirectory . $video_url;

                // Check if the file exists
                if (file_exists($videoFilePath)) {
                    // Delete the video file from the directory
                    unlink($videoFilePath);
                    header("location: Video.php");
                } else {
                    echo "Video file not found.";
                    // Handle this case based on your requirements.
                }
            } else {
                echo "Error deleting video from the database.";
                // Handle this case based on your requirements.
            }
        } else {
            echo "Video not found.";
            // Handle this case based on your requirements.
        }
    } else {
        echo "Missing parameter: id.";
        // Handle this case based on your requirements.
    }
?>

