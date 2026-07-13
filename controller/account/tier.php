<?php 
redirect_if_not_logged_in();
view('account/tier.view.php', ['heading' => 'Gym Membership']);
?>