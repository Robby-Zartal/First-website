<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        
        // Check for errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            die('Upload failed with error code: ' . $file['error']);
        }

        // Validate file type (optional)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowedTypes)) {
            die('Invalid file type. Only JPG, PNG, and GIF files are allowed.');
        }

        // Set the upload directory
        $uploadDir = 'uploads/';
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