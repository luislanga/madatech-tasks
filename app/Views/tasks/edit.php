<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2 class="mb-4">Editar Tarefa</h2>
    <?php include 'form.php'; ?>
</div>
<?= $this->endSection() ?>