<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        // Set the upload directory
        $uploadDir = 'uploads/';
        
        // Create the upload directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        // Get file details
        $fileName = basename($_FILES['file']['name']);
        $filePath = $uploadDir . $fileName;
        $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        
        // Validate file type
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileType, $allowedTypes)) {
            // Move the uploaded file to the designated directory
            if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
                echo json_encode(['status' => 'success', 'message' => "File uploaded successfully: " . htmlspecialchars($fileName)]);
            } else {
                echo json_encode(['status' => 'error', 'message' => "Error uploading the file."]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed."]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => "No file was uploaded or there was an upload error."]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => "Invalid request method."]);
}
?>