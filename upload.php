<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];

        // Check for errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            die('Upload failed with error code: ' . $file['error']);
        }

        // Set the upload directory
        $uploadDir = 'C:\Users\rober\Documents\Coding\First website\uploads';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Create the uploads directory if it doesn't exist
        }

        // Move the uploaded file to the uploads directory
        $destination = $uploadDir . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            echo 'File uploaded successfully: ' . htmlspecialchars($file['name']);
        } else {
            echo 'Failed to move uploaded file.';
        }
    } else {
        echo 'No file uploaded.';
    }
} else {
    echo 'Invalid request method.';
}
?>