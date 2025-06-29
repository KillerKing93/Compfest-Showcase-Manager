<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="row g-4">
    <!-- Statistics Cards -->
    <div class="col-md-4">
        <div class="card animate__animated animate__fadeInUp">
            <div class="card-body text-center">
                <i class="bi bi-collection text-primary" style="font-size: 2.5rem;"></i>
                <h3 class="mt-3 fw-bold"><?= $total_projects ?></h3>
                <p class="text-muted mb-0">Total Projects</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
            <div class="card-body text-center">
                <i class="bi bi-eye text-success" style="font-size: 2.5rem;"></i>
                <h3 class="mt-3 fw-bold"><?= $total_projects ?></h3>
                <p class="text-muted mb-0">Active Showcases</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
            <div class="card-body text-center">
                <i class="bi bi-calendar-check text-info" style="font-size: 2.5rem;"></i>
                <h3 class="mt-3 fw-bold"><?= date('d') ?></h3>
                <p class="text-muted mb-0">Today's Date</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Projects -->
<div class="row mt-5">
    <div class="col-12">
        <div class="card animate__animated animate__fadeInUp" style="animation-delay: 0.3s;">
            <div class="card-header bg-transparent border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-clock-history"></i> Recent Projects
                    </h5>
                    <a href="/admin/projects" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus"></i> Add New
                    </a>
                </div>
            </div>
            <div class="card-body">
                <?php if (empty($recent_projects)): ?>
                    <div class="text-center py-4">
                        <i class="bi bi-inbox text-muted" style="font-size: 3rem;"></i>
                        <p class="text-muted mt-3">No projects yet. Start by adding your first project!</p>
                        <a href="/admin/projects/create" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Add Project
                        </a>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Description</th>
                                    <th>URL</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_projects as $project): ?>
                                    <tr>
                                        <td>
                                            <strong><?= esc($project['name']) ?></strong>
                                        </td>
                                        <td>
                                            <?= esc(substr($project['description'], 0, 50)) ?>...
                                        </td>
                                        <td>
                                            <a href="<?= esc($project['url']) ?>" target="_blank" class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-box-arrow-up-right"></i> View
                                            </a>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                <?= date('d M Y', strtotime($project['created_at'])) ?>
                                            </small>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="/admin/projects/edit/<?= $project['id'] ?>" class="btn btn-outline-warning">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="/admin/projects/delete/<?= $project['id'] ?>" class="btn btn-outline-danger" 
                                                   onclick="return confirm('Are you sure you want to delete this project?')">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?> 