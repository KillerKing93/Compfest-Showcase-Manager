<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Compfest Showcase Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { 
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); 
            min-height: 100vh; 
        }
        .sidebar { 
            background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        .sidebar .nav-link { 
            color: rgba(255,255,255,0.8); 
            border-radius: 0.5rem;
            margin: 0.25rem 0;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { 
            color: white; 
            background: rgba(255,255,255,0.1);
            transform: translateX(5px);
        }
        .main-content { 
            background: white; 
            border-radius: 1rem; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        .btn-primary { 
            background: linear-gradient(90deg, #667eea, #764ba2); 
            border: none; 
        }
        .btn-primary:hover { 
            background: linear-gradient(90deg, #764ba2, #667eea); 
        }
        .card { 
            border-radius: 1rem; 
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0">
                <div class="sidebar p-3">
                    <div class="text-center mb-4">
                        <i class="bi bi-shield-check text-white" style="font-size: 2rem;"></i>
                        <h5 class="text-white mt-2">Admin Panel</h5>
                        <small class="text-white-50">Compfest Manager</small>
                    </div>
                    
                    <nav class="nav flex-column">
                        <a class="nav-link <?= current_url() == base_url('admin/dashboard') ? 'active' : '' ?>" href="/admin/dashboard">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                        <a class="nav-link <?= current_url() == base_url('admin/projects') ? 'active' : '' ?>" href="/admin/projects">
                            <i class="bi bi-collection"></i> Projects
                        </a>
                        <a class="nav-link" href="/" target="_blank">
                            <i class="bi bi-eye"></i> View Showcase
                        </a>
                        <hr class="text-white-50">
                        <a class="nav-link text-danger" href="/auth/logout">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </nav>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <div class="p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h2 class="fw-bold text-dark"><?= $this->renderSection('title', 'Dashboard') ?></h2>
                            <p class="text-muted mb-0">Welcome back, <?= session()->get('username') ?>!</p>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">Last login: <?= date('d M Y H:i') ?></small>
                        </div>
                    </div>
                    
                    <!-- Flash Messages -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success animate__animated animate__fadeIn">
                            <i class="bi bi-check-circle"></i> <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger animate__animated animate__fadeIn">
                            <i class="bi bi-exclamation-triangle"></i> <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Content -->
                    <div class="main-content p-4">
                        <?= $this->renderSection('content') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 