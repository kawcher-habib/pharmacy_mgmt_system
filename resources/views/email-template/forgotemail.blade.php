<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 600px;
      margin: 50px auto;
      background: white;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="text-center">
      <img src="logo.png" alt="Your Logo" style="max-width: 150px;">
      <h2 class="mt-4">Reset Your Password</h2>
      <p class="text-muted">It seems that you requested a password reset. Use rendom password below after using rendom password please reset your password.</p>
    </div>
    <div class="text-center mt-4">
      <h3 class="btn btn-primary">{{ $rendomPassword }}</h3>
    </div>
    <hr>
    <p class="text-muted text-center mt-3">If you didn’t request a password reset, no further action is required.</p>
    <p class="text-center">Thanks,<br>The hk Team</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
