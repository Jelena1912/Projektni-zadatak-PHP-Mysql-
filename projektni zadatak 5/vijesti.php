<?php

if (isset($action) && $action != '') {
    $query  = 'SELECT * FROM news';
    $query .= " WHERE id=" .$_GET['action'];
    $MySQL =NULL;
    $result = @mysqli_query( $conn, $query);
    $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
    print '
			<div class="news">
				<img src="vijesti/' . $row['picture'] . '" alt="' . $row['title'] . '" title="' . $row['title'] . '">
				<h2>' . $row['title'] . '</h2>
				<p>'  . $row['description'] . '</p>
				<time datetime="' . $row['date'] . '">' . pickerDateToMysql($row['date']) . '</time>
				<hr>
			</div>';
}
else {
    print '<center><h1>Vijesti</h1></center>';
    $query  = 'SELECT * FROM news';
    $query .= " WHERE archive='N'";
    $query .= " ORDER BY date DESC";
    $result = @mysqli_query($conn, $query);
    while($row = @mysqli_fetch_array($result)) {
        print '
			<div class="news">
				<img src="vijesti/' . $row['picture'] . '" alt="' . $row['title'] . '" title="' . $row['title'] . '">
				<h2>' . $row['title'] . '</h2>';
        if(strlen($row['description']) > 300) {
            echo substr(strip_tags($row['description']), 0, 300).'... <a href="index.php?menu=' . $menu . '&amp;action=' . $row['id'] . '">Više</a>';
        } else {
            echo strip_tags($row['description']);
        }
        print '
				<time datetime="' . $row['date'] . '">' . pickerDateToMysql($row['date']) . '</time>
				<hr>
			</div>';
    }
}
?>
