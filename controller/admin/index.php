<?php

redirect_if_not_logged_in();

$db = $container->resolve('Core\Database');

$sql = "SELECT
            member_bookings.id,
            users.given_name,
            users.family_name,
            users.email,
            class_types.title AS class_title,
            class_events.starts_at,
            class_events.ends_at,
            CONCAT(
                instructors.given_name,
                ' ',
                instructors.family_name
            ) AS instructor_name
        FROM member_bookings
        INNER JOIN users
            ON member_bookings.user_id = users.id
        INNER JOIN class_events
            ON member_bookings.class_event_id = class_events.id
        INNER JOIN class_types
            ON class_events.class_type_id = class_types.id
        INNER JOIN instructors
            ON class_events.instructor_id = instructors.id
        ORDER BY class_events.starts_at DESC
        LIMIT 10";

$bookings = $db->getAll($sql);

view('admin/index.view.php', [
    'heading' => 'Admin Dashboard',
    'bookings' => $bookings
]);
