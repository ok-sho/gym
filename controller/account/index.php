<?php 
redirect_if_not_logged_in();
view('account/index.view.php', ['heading' => 'Account Info']);
?>