<?php
$uploadPath = __DIR__ . '/uploads/digital_cards';

if (!file_exists($uploadPath)) {
    mkdir($uploadPath, 0777, true);
    echo "Directory created: $uploadPath<br>";
} else {
    echo "Directory exists: $uploadPath<br>";
}

if (is_writable($uploadPath)) {
    echo "Directory is writable ✓<br>";
} else {
    echo "Directory is NOT writable ✗<br>";
}

// Test file creation
$testFile = $uploadPath . '/test.txt';
if (file_put_contents($testFile, 'test')) {
    echo "Test file created successfully ✓<br>";
    echo "File permissions: " . substr(sprintf('%o', fileperms($testFile)), -4) . "<br>";
    unlink($testFile);
} else {
    echo "Failed to create test file ✗<br>";
}
?>
