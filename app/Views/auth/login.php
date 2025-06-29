<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Compfest Showcase Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            min-height: 100vh; 
            display: flex; 
            align-items: center; 
        }
        .login-card { 
            background: rgba(255, 255, 255, 0.95); 
            backdrop-filter: blur(10px);
            border-radius: 1.5rem; 
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .btn-primary { 
            background: linear-gradient(90deg, #667eea, #764ba2); 
            border: none; 
            border-radius: 0.75rem;
        }
        .btn-primary:hover { 
            background: linear-gradient(90deg, #764ba2, #667eea); 
            transform: translateY(-2px);
        }
        .form-control {
            border-radius: 0.75rem;
            border: 2px solid #e9ecef;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card animate__animated animate__fadeInDown">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="bi bi-shield-lock text-primary" style="font-size: 3rem;"></i>
                            <h2 class="mt-3 fw-bold text-dark">Admin Login</h2>
                            <p class="text-muted">Compfest Showcase Manager</p>
                        </div>
                        
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger animate__animated animate__shakeX">
                                <i class="bi bi-exclamation-triangle"></i> <?= $error ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (isset($validation)): ?>
                            <div class="alert alert-danger">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>
                        
                        <form action="" method="post" autocomplete="off">
                            <div class="mb-3">
                                <label for="username" class="form-label fw-semibold">
                                    <i class="bi bi-person"></i> Username
                                </label>
                                <input type="text" class="form-control form-control-lg" id="username" name="username" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">
                                    <i class="bi bi-key"></i> Password
                                </label>
                                <input type="password" class="form-control form-control-lg" id="password" name="password" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </button>
                            
                            <div class="text-center">
                                <a href="/" class="text-decoration-none">
                                    <i class="bi bi-arrow-left"></i> Kembali ke Showcase
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 