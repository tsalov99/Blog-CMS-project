<?php
echo "<div class='h5 ml-auto p-2'><a href=index.php?page=1>first </a> || <a href=index.php?page=$prevousPage>prevous </a> || <a href=index.php?page=$nextPage>next </a> || <a href=index.php?page=$totalPages>last</a><span class='pageCounter'>Current page: $page</span></div>";