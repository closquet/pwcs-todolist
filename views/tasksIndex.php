<div class="main-content wrapper">
    <h1>Vos prochaines tâches</h1>
    <ol class="tasks">
        <?php foreach ($data['tasks'] as $task): ?>
            <li>
                <div class="task grid">
                        <form action="index.php" method="post">
                            <label for="<?= $task->id; ?>" class="checkbox <?php if ($task->is_done){echo 'done';} ?>">
                                <input title="Changer le statut" type="checkbox" id="<?= $task->id; ?>" name="is_done"<?php if ($task->is_done){echo 'checked';} ?>>
                                <span class="checkbox__label fs-base"><?= $task->description; ?></span>
                            </label>
                            <button type="submit">Enregistrer</button>
                            <input type="hidden" name="r" value="tasks">
                            <input type="hidden" name="a" value="postUpdate">
                            <input type="hidden" name="id" value=""<?= $task->id; ?>">
                        </form>
                        <form action="index.php" method="get">
                            <button type="submit">modifier</button>
                            <input type="hidden" name="a" value="getUpdate">
                            <input type="hidden" name="r" value="tasks">
                            <input type="hidden" name="id" value=""<?= $task->id; ?>">
                        </form>
                        <form action="index.php" method="post">
                            <button type="submit">supprimer</button>
                            <input type="hidden" name="a" value="postDelete">
                            <input type="hidden" name="r" value="tasks">
                            <input type="hidden" name="id" value="<?= $task->id; ?>">
                        </form>
                </div>
            </li>
        <?php endforeach; ?>
    </ol>
    <hr>
    <h1>Ajouter une tâche</h1>
    <form class="new-task-form" action="index.php" method="post">
        <label for="description" class="textfield">
            <input type="text" name="description" id="description" size="60">
            <span class="textfield__label">Description</span>
        </label>
        <button class="new-task-form__submit" type="submit">Créer cette nouvelle tâche</button>
        <input type="hidden" name="r" value="tasks">
        <input type="hidden" name="a" value="create">
    </form>
</div>
