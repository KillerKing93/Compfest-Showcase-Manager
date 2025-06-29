<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>Edit Project<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card animate__animated animate__fadeInUp">
            <div class="card-header bg-transparent border-0">
                <h4 class="mb-0">
                    <i class="bi bi-pencil-square"></i> Edit Project: <?= esc($project['name']) ?>
                </h4>
            </div>
            <div class="card-body">
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger animate__animated animate__shakeX">
                        <i class="bi bi-exclamation-triangle"></i> Please fix the following errors:
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
                
                <form action="" method="post" autocomplete="off">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label fw-semibold">
                                <i class="bi bi-tag"></i> Project Name *
                            </label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" 
                                   value="<?= old('name', $project['name']) ?>" required placeholder="Enter project name">
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label fw-semibold">
                                <i class="bi bi-text-paragraph"></i> Description
                            </label>
                            <textarea class="form-control" id="description" name="description" rows="4" 
                                      placeholder="Describe your project..."><?= old('description', $project['description']) ?></textarea>
                        </div>
                        
                        <div class="col-md-12 mb-4">
                            <label for="url" class="form-label fw-semibold">
                                <i class="bi bi-link-45deg"></i> Website URL *
                            </label>
                            <input type="url" class="form-control form-control-lg" id="url" name="url" 
                                   value="<?= old('url', $project['url']) ?>" required placeholder="https://example.com">
                            <small class="text-muted">Enter the full URL including http:// or https://</small>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-check-circle"></i> Update Project
                        </button>
                        <a href="/admin/projects" class="btn btn-outline-secondary btn-lg">
                            <i class="bi bi-arrow-left"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?> 