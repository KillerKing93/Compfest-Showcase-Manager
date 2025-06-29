<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg animate__animated animate__fadeInDown">
                <div class="card-body">
                    <h2 class="mb-4 fw-bold text-primary">Tambah Project</h2>
                    <?php if (isset($validation)): ?>
                        <div class="alert alert-danger">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post" autocomplete="off">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Project</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">URL Website</label>
                            <input type="url" class="form-control" id="url" name="url" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                        <a href="/projects" class="btn btn-link w-100 mt-2">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 