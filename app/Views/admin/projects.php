<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>Manage Projects<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">
        <i class="bi bi-collection"></i> Manage Projects
    </h3>
    <a href="/admin/projects/create" class="btn btn-primary">
        <i class="bi bi-plus"></i> Add New Project
    </a>
</div>

<div class="card animate__animated animate__fadeInUp">
    <div class="card-body">
        <?php if (empty($projects)): ?>
            <div class="text-center py-5">
                <i class="bi bi-inbox text-muted" style="font-size: 4rem;"></i>
                <h4 class="mt-3 text-muted">No Projects Found</h4>
                <p class="text-muted">Start by adding your first project to showcase.</p>
                <a href="/admin/projects/create" class="btn btn-primary btn-lg">
                    <i class="bi bi-plus"></i> Add Your First Project
                </a>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Description</th>
                            <th>URL</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $index => $project): ?>
                            <tr class="animate__animated animate__fadeIn" style="animation-delay: <?= $index * 0.1 ?>s;">
                                <td><?= $index + 1 ?></td>
                                <td>
                                    <strong><?= esc($project['name']) ?></strong>
                                </td>
                                <td>
                                    <?= esc(substr($project['description'], 0, 80)) ?>...
                                </td>
                                <td>
                                    <a href="<?= esc($project['url']) ?>" target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-box-arrow-up-right"></i> Visit
                                    </a>
                                </td>
                                <td>
                                    <small class="text-muted">
                                        <?= date('d M Y H:i', strtotime($project['created_at'])) ?>
                                    </small>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="/admin/projects/edit/<?= $project['id'] ?>" class="btn btn-outline-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="/admin/projects/delete/<?= $project['id'] ?>" class="btn btn-outline-danger" 
                                           onclick="return confirm('Are you sure you want to delete this project?')" title="Delete">
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

<?= $this->endSection() ?> 