<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container py-5">
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <h2 class="fw-bold text-primary">SEA Compfest 17 Showcase</h2>
        <div>
            <a href="https://compfest-17-sea.craftthingy.com" target="_blank" class="btn btn-success me-2">
                <i class="bi bi-box-arrow-up-right"></i> Buka di Tab Baru
            </a>
            <a href="/projects" class="btn btn-outline-secondary">Kembali ke Manager</a>
        </div>
    </div>
    <div class="ratio ratio-16x9 shadow-lg rounded animate__animated animate__fadeIn">
        <iframe src="https://compfest-17-sea.craftthingy.com" allowfullscreen style="border-radius:1.2rem; border:none;"></iframe>
    </div>
</div>
<?= $this->endSection() ?> 