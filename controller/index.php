<?php 

redirect_if_not_logged_in();

$db = $container->resolve('Core\Database');
$user = $db->getOne("SELECT id FROM users WHERE email = :email", ['email' => $_SESSION['user']['email']]);

$next_class = $db->getOne("SELECT class_types.title, class_events.starts_at FROM member_bookings INNER JOIN class_events ON member_bookings.class_event_id = class_events.id 
        INNER JOIN class_types ON class_events.class_type_id = class_types.id WHERE member_bookings.user_id = :user_id AND class_events.starts_at >= NOW() ORDER BY class_events.starts_at 
        ASC LIMIT 1", ['user_id' => $user['id']]);

view('index.view.php', ['heading' => 'Home','next_class' => $next_class,]);