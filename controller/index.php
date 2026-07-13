<?php 

redirect_if_not_logged_in();

view('index.view.php', ['heading' => 'Home']);