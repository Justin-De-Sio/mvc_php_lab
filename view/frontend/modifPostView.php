<?php
$title = 'Modification de commentaire';
ob_start();
echo $id
?>
    <h2>Commentaires</h2>
<form action="index.php?action=comment&amp;id=<?= $id ?>" method="post">
    <div>
        <label for="author"><?= $comment['author'] ?></label><br/>
        <input type="text" id="author" name="author"/>
    </div>
    <div>
        <label for="comment">Commentaire</label><br/>
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit"/>
    </div>
</form>

<?php
$content = ob_get_clean();
require ('template.php');
