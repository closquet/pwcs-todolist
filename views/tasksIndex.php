<div class="main-content wrapper">
    <h1>Les tâches de <?= $_SESSION['user']->first_name; ?></h1>
    <?php if ($data['tasks']): ?>
        <ul>
            <?php foreach ($data['tasks'] as $task): ?>
                <li><?= $task->description; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Vous n’avez pas encore créé de tâche…</p>
    <?php endif; ?>
</div>
