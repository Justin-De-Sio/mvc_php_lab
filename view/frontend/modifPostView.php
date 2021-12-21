<?php
$title = 'Modification de commentaire';
ob_start();
?>
    <h2>Modification de Commentaires</h2>
    <form action="index.php?action=modifComment&amp;id=<?= $id ?>" method="post">
        <div>
            <label for="author"><?= $comment['author'] ?></label><br/>
        </div>
        <div>
            <label for="comment">Nouveau commentaire:</label><br/>
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit"/>
        </div>
    </form>

<?php
$content = ob_get_clean();
require('template.php');
