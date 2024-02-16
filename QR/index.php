<?php


$code = $_GET['code'];

require_once 'phpqrcode/qrlib.php';

// Text to encode in QR code
$text = 'Hello, World!';

// Path to save the generated QR code image
$imagePath  = 'qrfiles/qrcode.png';

if($code){
    $text = $code;
    
    $imagePath  = 'qrfiles/'.substr(md5(mt_rand()), 0, 7).'.png';
}




// QR code options
$eccLevel = QR_ECLEVEL_L; // Error correction level: L, M, Q, H
$moduleSize = 10; // Size of each QR code module

// Generate the QR code
QRcode::png($text, $imagePath, $eccLevel, $moduleSize, 2);

// Load the generated image
$image = imagecreatefrompng($imagePath);

// Create a new image with extra height for text
$width = imagesx($image);
$height = imagesy($image) + 15; // Adjust the height according to your text size
$newImage = imagecreatetruecolor($width, $height);

// Set the background color of the new image (optional)
$backgroundColor = imagecolorallocate($newImage, 255, 255, 255); // White color
imagefill($newImage, 0, 0, $backgroundColor);

// Copy the QR code image onto the new image
imagecopy($newImage, $image, 0, 0, 0, 0, $width, imagesy($image));

// Add text under the QR code
$textColor = imagecolorallocate($newImage, 0, 0, 0); // Black color
$text = 'Click Invitations'; // Modify the text as needed
$textX = ($width - imagefontwidth(5) * strlen($text)) / 2; // Adjust the position of the text
$textY = imagesy($image) - 5; // Adjust the position of the text
imagestring($newImage, 5, $textX, $textY, $text, $textColor);
imagestring($newImage, 5, $textX, $textY, $text, $textColor);

// Save the modified image
imagepng($newImage, $imagePath);

// Free up memory
imagedestroy($image);
imagedestroy($newImage);

// Display the QR code with text
header('Content-Type: image/png');
readfile($imagePath);