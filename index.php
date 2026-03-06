<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Profile Generator</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

<style>
:root {
        --bg-dark: #0f172a;
        --card-bg: #1e293b;
        /* Changed blue to Black/Slate */
        --accent-black: #000000; 
        --input-bg: rgba(15, 23, 42, 0.6);
        --text-main: #f1f5f9;
        --text-muted: #94a3b8;
}

body{
    background: dark (135deg,#4e73df,#1cc88a);
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family: 'Segoe UI', sans-serif;
}

.card{
    max-width:700px;
    width:100%;
    border:none;
    border-radius:15px;
    overflow:hidden;
}

.card-header{
    background:#111;
    color:#fff;
    font-size:1.4rem;
    font-weight:600;
    text-align:center;
}

.form-control{
    border-radius:8px;
    border:1px solid #ccc;
    transition:0.3s;
}

.form-control:focus{
    border-color:#4e73df;
    box-shadow:0 0 0 0.15rem rgba(78,115,223,0.25);
}

.form-check-input{
    cursor:pointer;
}

.form-check-label{
    cursor:pointer;
}

.btn-dark{
    background:#4e73df;
    border:none;
    border-radius:8px;
    font-weight:600;
    transition:0.3s;
}

.btn-dark:hover{
    background:#2e59d9;
    transform:translateY(-2px);
}

.card-body{
    background:#fff;
}

label{
    font-weight:500;
}

</style>

</head>
<body>

<div class="card shadow-lg">
  <div class="card-header p-3">
    Personal Profile Generator
  </div>

  <div class="card-body p-4">
    <form action="profile.php" method="POST" enctype="multipart/form-data">

      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" name="full_name" required/>
      </div>

      <div class="row mb-3">
        <div class="col">
          <label class="form-label">Age</label>
          <input type="number" class="form-control" name="age" required/>
        </div>

        <div class="col">
          <label class="form-label">Course / Program</label>
          <input type="text" class="form-control" name="course" required/>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email" class="form-control" name="email" required/>
      </div>

      <div class="mb-3">
        <label class="form-label">Gender</label><br/>

        <?php foreach (['Male','Female','Other'] as $g): ?>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" value="<?=$g?>" required/>
          <label class="form-check-label"><?=$g?></label>
        </div>
        <?php endforeach; ?>

      </div>

      <div class="mb-3">
        <label class="form-label">
        Hobbies <small class="text-muted">(select at least 5)</small>
        </label>

        <div class="row row-cols-2 row-cols-md-3 g-1">

        <?php foreach (['Reading','Writing','Drawing','Photography','Gaming','Coding','Music','Sports','Cooking','Traveling','Dancing','Fitness'] as $h): ?>

          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="hobbies[]" value="<?=$h?>"/>
              <label class="form-check-label"><?=$h?></label>
            </div>
          </div>

        <?php endforeach; ?>

        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Short Biography</label>
        <textarea class="form-control" name="bio" rows="3" required></textarea>
      </div>

      <div class="mb-4">
        <label class="form-label">Profile Photo</label>
        <input type="file" class="form-control" name="profile_image" accept="image/*"/>
      </div>

      <button type="submit" class="btn btn-dark w-100">
        Generate Profile
      </button>

    </form>
  </div>
</div>

</body>
</html>