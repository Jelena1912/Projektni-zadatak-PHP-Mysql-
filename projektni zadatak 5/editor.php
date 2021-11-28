<?php
if ($_SESSION['user']['valid'] == 'true') {
    if (!isset($action)) { $action = 1; }
    print '
		<h1>Editor</h1>
		<div>';

    # Editor News
    include "editor/news.php";
    print '
		</div>';
}
else {
    $_SESSION['message'] = '<p id="poruke">Molimo registrirajte se.</p>';
    header("Location: index.php?menu=6");
}
?>