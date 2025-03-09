<form novalidate action="<?= isset($task) ? '/edit/' . esc($task['id']) : '/create' ?>" method="post" class="card p-4">

    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" name="title" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" id="title"
            placeholder="Digite o título da tarefa"
            value="<?= isset($old['title']) ? esc($old['title']) : (isset($task) ? esc($task['title']) : '') ?>" required>
        <?php if (isset($errors['title'])): ?>
            <div class="invalid-feedback"><?= esc($errors['title']) ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea name="description" class="form-control <?= isset($errors['description']) ? 'is-invalid' : '' ?>" id="description" rows="4"
            placeholder="Descreva a tarefa" required><?= isset($old['description']) ? esc($old['description']) : (isset($task) ? esc($task['description']) : '') ?></textarea>
        <?php if (isset($errors['description'])): ?>
            <div class="invalid-feedback"><?= esc($errors['description']) ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-select <?= isset($errors['status']) ? 'is-invalid' : '' ?>" id="status">
            <option value="pendente" <?= (isset($old['status']) && $old['status'] == 'pendente') || (isset($task) && $task['status'] == 'pendente') ? 'selected' : '' ?>>Pendente</option>
            <option value="em andamento" <?= (isset($old['status']) && $old['status'] == 'em andamento') || (isset($task) && $task['status'] == 'em andamento') ? 'selected' : '' ?>>Em andamento</option>
            <option value="concluída" <?= (isset($old['status']) && $old['status'] == 'concluída') || (isset($task) && $task['status'] == 'concluída') ? 'selected' : '' ?>>Concluída</option>
        </select>
        <?php if (isset($errors['status'])): ?>
            <div class="invalid-feedback"><?= esc($errors['status']) ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary w-100">
        <?= isset($task) ? 'Atualizar Tarefa' : 'Criar Tarefa' ?>
    </button>
</form>