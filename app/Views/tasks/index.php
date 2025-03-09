<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Tarefas</h1>

<a href="/create" class="btn btn-primary mt-3 mb-3">Nova Tarefa</a>

<table class="table">
    <thead>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['description']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td>
                    <div class="d-flex flex-column gap-2">
                        <a href="/edit/<?= esc($task['id']) ?>" class="btn btn-primary btn-sm" style="max-width: 64px;">Editar</a>
                        <a href="/delete/<?= esc($task['id']) ?>" class="btn btn-danger btn-sm" style="max-width: 64px;" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>