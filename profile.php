<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { 
            background: dark (135deg, #667eea 0%, #764ba2 100%); 
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card { 
            max-width: 500px; 
            margin: auto; 
            border-radius: 20px; 
            border: none; 
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2) !important;
        }
        .profile-header {
            background: #fff;
            padding: 30px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }
        .profile-img { 
            width: 120px; 
            height: 120px; 
            object-fit: cover; 
            border-radius: 50%; /* Circular image */
            border: 4px solid #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 15px;
        }
        .placeholder-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #e9ecef;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin-bottom: 15px;
        }
        .badge { 
            border-radius: 50px; 
            padding: 8px 15px;
            background: #764ba2 !important; 
            font-weight: 500; 
        }
        .info-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #999;
            margin-bottom: 0;
        }
        .info-value {
            font-weight: 600;
            color: #333;
        }
        .btn-custom {
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-custom:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<?php
function clean($v) { return htmlspecialchars(trim($v), ENT_QUOTES, 'UTF-8'); }

// Handling post data
$name    = clean($_POST['full_name'] ?? 'Jane Doe');
$age     = (int)($_POST['age'] ?? 25);
$course  = clean($_POST['course'] ?? 'Software Engineering');
$email   = clean($_POST['email'] ?? 'jane.doe@example.com');
$gender  = clean($_POST['gender'] ?? 'Female');
$bio     = clean($_POST['bio'] ?? 'Passionate developer and coffee enthusiast.');
$hobbies = array_map('clean', $_POST['hobbies'] ?? ['Coding', 'Reading', 'Hiking']);

$imgSrc = '';
if (!empty($_FILES['profile_image']['name'])) {
    $dir = 'uploads/';
    if (!is_dir($dir)) mkdir($dir, 0755, true);
    $ext  = strtolower(pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION));
    $dest = $dir . uniqid() . '.' . $ext;
    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $dest)) $imgSrc = $dest;
}
?>

<div class="container">
    <div class="card shadow">
        <div class="profile-header">
            <?php if ($imgSrc): ?>
                <img src="<?=$imgSrc?>" class="profile-img"/>
            <?php else: ?>
                <div class="placeholder-avatar text-muted">👤</div>
            <?php endif; ?>
            
            <h3 class="fw-bold mb-1"><?=$name?></h3>
            <p class="text-primary fw-semibold mb-0"><?=$course?></p>
        </div>

        <div class="card-body p-4 bg-white">
            <div class="row text-center mb-4">
                <div class="col-4 border-end">
                    <p class="info-label">Age</p>
                    <p class="info-value"><?=$age?></p>
                </div>
                <div class="col-4 border-end">
                    <p class="info-label">Gender</p>
                    <p class="info-value"><?=$gender?></p>
                </div>
                <div class="col-4">
                    <p class="info-label">Role</p>
                    <p class="info-value">Student</p>
                </div>
            </div>

            <div class="mb-4">
                <p class="info-label mb-2">Email Address</p>
                <p class="info-value"><?=$email?></p>
            </div>

            <?php if ($bio): ?>
                <div class="mb-4">
                    <p class="info-label mb-2">Biography</p>
                    <p class="text-muted small"><?=nl2br($bio)?></p>
                </div>
            <?php endif; ?>

            <?php if ($hobbies): ?>
                <div class="mb-4">
                    <p class="info-label mb-2">Interests</p>
                    <div class="d-flex flex-wrap gap-2">
                        <?php foreach ($hobbies as $h): ?>
                            <span class="badge"><?=$h?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <a href="index.php" class="btn btn-outline-secondary btn-custom w-100 mt-2">Edit Profile</a>
        </div>
    </div>
</div>

</body>
</html>