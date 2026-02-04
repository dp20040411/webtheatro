<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      color: #333;
      background-color: #f7f7f7;
    }

    .hero-section {
      position: relative;
      background-image: url('ustp.jpg');
      background-size: cover;
      background-position: center;
      height: 100vh;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 15px;
    }

    .hero-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      margin-top: 200px;
    }

    .hero-content h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 20px;
      color: white;
      text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);
    }

    .hero-content p {
      font-size: 1.25rem;
      margin-bottom: 30px;
      text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.6);
    }

    .btn-custom {
      background-color: #28a745;
      color: white;
      padding: 12px 30px;
      font-size: 1.1rem;
      border-radius: 30px;
      transition: all 0.3s ease;
      border: none;
      text-transform: uppercase;
    }

    .btn-custom:hover {
      background-color: #218838;
      transform: scale(1.05);
    }

    .navbar {
      background-color: rgba(0, 0, 0, 0.5);
    }

    .navbar-brand {
      color: white !important;
      font-weight: 700;
    }

    .navbar-nav .nav-link {
      color: white;
      font-size: 1.1rem;
      margin-right: 20px;
      padding: 10px;
    }

    .navbar-nav .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.2);
      border-radius: 5px;
    }
  </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">E THEATRO’S ONLINE REGISTRATION</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="openAdminModal()">
            <i class="fas fa-cogs"></i> Admin
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">
            <i class="fas fa-info-circle"></i> About
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<div class="hero-section">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h1>Welcome to E Theatro's Online Registration</h1>
    <p>Join us today and experience the magic of theatre.</p>
    <div class="d-flex justify-content-center gap-3">
      <a href="./student/apply.php" class="btn btn-custom">Apply</a>
      <a href="./student/view.php" class="btn btn-custom">View</a>
    </div>
  </div>
</div>

<!-- Admin Password Modal -->
<div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminModalLabel">Admin Access</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="position-relative">
          <input type="password" id="adminPasswordInput" class="form-control" placeholder="Enter admin password">
          <span onclick="togglePassword()" style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer;" id="toggleIcon">
            <i class="fas fa-eye" id="eyeIcon"></i>
          </span>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-success" onclick="validatePassword()">Enter</button>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script>
  function openAdminModal() {
    const modal = new bootstrap.Modal(document.getElementById('adminModal'));
    modal.show();
  }

  function togglePassword() {
    const input = document.getElementById("adminPasswordInput");
    const icon = document.getElementById("eyeIcon");
    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }

  function validatePassword() {
    const password = document.getElementById("adminPasswordInput").value;
    if (password === "admin123") {
      window.location.href = "./admin/login.php";
    } else {
      alert("Incorrect password!");
    }
  }
</script>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
