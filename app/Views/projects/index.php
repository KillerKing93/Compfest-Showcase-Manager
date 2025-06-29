<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Compfest Project Showcase</h1>
        <div class="d-flex gap-2">
            <a href="/auth/login" class="btn btn-outline-primary">
                <i class="bi bi-shield-lock"></i> Admin Login
            </a>
            <a href="/projects/create" class="btn btn-primary btn-lg shadow">+ Tambah Project</a>
        </div>
    </div>
    <div class="row g-4">
        <?php foreach ($projects as $project): ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-lg border-0 animate__animated animate__fadeInUp">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-primary"><?= esc($project['name']) ?></h5>
                        <p class="card-text flex-grow-1"><?= esc($project['description']) ?></p>
                        <a href="<?= esc($project['url']) ?>" target="_blank" class="btn btn-outline-success mb-2">Lihat Website</a>
                        <form action="/projects/delete/<?= $project['id'] ?>" method="post" onsubmit="return confirm('Yakin hapus project ini?')">
                            <button class="btn btn-danger w-100">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="mt-5 text-center text-muted">Showcase Manager &copy; <?= date('Y') ?></div>
</div>
<?= $this->endSection() ?> 