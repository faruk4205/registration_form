<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = htmlspecialchars($_POST['username'] ?? '');
    $fullname = htmlspecialchars($_POST['fullname'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $dob = htmlspecialchars($_POST['dob'] ?? '');
    $address = htmlspecialchars($_POST['address'] ?? '');
    $city = htmlspecialchars($_POST['city'] ?? '');
    $state = htmlspecialchars($_POST['state'] ?? '');
    $gender = htmlspecialchars($_POST['gender'] ?? '');
    $subscribe = isset($_POST['subscribe']) ? "Yes" : "No";
    
    
    $profile_picture = "";
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $target_dir = "uploads/";
        $profile_picture = $target_dir . basename($_FILES["profile_picture"]["name"]);
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);  
        }
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $profile_picture)) {
            
        } else {
            echo "Error uploading profile picture.";
        }
    }

    echo "<div class='card'>";
    echo "<h1>Registration Successful</h1>";
    echo "<p><strong>Username:</strong> $username</p>";
    echo "<p><strong>Full Name:</strong> $fullname</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Phone:</strong> $phone</p>";
    echo "<p><strong>Date of Birth:</strong> $dob</p>";
    echo "<p><strong>Address:</strong> $address</p>";
    echo "<p><strong>City:</strong> $city</p>";
    echo "<p><strong>State:</strong> $state</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
    echo "<p><strong>Subscribed to newsletter:</strong> $subscribe</p>";

    
    if ($profile_picture) {
        echo "<p><strong>Profile Picture:</strong></p>";
        echo "<img src='$profile_picture' alt='Profile Picture' style='width:100px; height:100px; border-radius:50%;'>";
    } else {
        echo "<p><strong>Profile Picture:</strong> No picture uploaded.</p>";
    }

    echo "<a href='index.php' class='button go-back'>Go Back</a>";
    echo "</div>";
}
?>
