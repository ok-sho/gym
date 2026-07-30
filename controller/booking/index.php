<?php

$db = $container->resolve('Core\Database');
$class_types = $db->getAll("SELECT id, title FROM class_types");
$class_choice = filter_input(INPUT_GET, 'class_choice', FILTER_VALIDATE_INT) ?? 0;
$week_choice = filter_input(INPUT_GET, 'week_of', FILTER_VALIDATE_INT) ?? 0;

$sql_base = "
SELECT class_types.title, class_events.id, class_events.starts_at, class_events.ends_at, class_events.max_participants, 
concat(instructors.given_name,' ',instructors.family_name) as instructor_name 
FROM `class_events` 
INNER JOIN `class_types` ON class_events.class_type_id = class_types.id 
INNER JOIN `instructors` ON class_events.instructor_id = instructors.id 
WHERE class_events.starts_at >= :todays_date
AND class_events.starts_at >= :week_start
AND class_events.starts_at <= :week_end
";

$params = [
  'todays_date' => $wc->formatYMD($wc->today),
  'week_start' => $wc->formatYMD($wc->weeks[$week_choice]['sun']['dt']),
  'week_end' => $wc->formatYMDTime($wc->weeks[$week_choice]['sat']['dt_end']),
];


if (isset($class_choice) && $class_choice != 0){
	$sql= $sql_base . "AND class_events.class_type_id= :class_type_id ORDER BY class_events.starts_at";
	$params['class_type_id'] = $class_choice;
} else{
	$sql= $sql_base. "ORDER BY class_events.starts_at";
}
$classes = $db->getAll($sql,$params);

// insert classes into weekly calendar
foreach (array_slice($wc->weeks[$week_choice], 2) as $weekday_key => $weekday) {
  $events = [];
  foreach ($classes as $class_event) {
    if ($class_event["starts_at"] >= $wc->formatYMDTime($weekday['dt']) &&  $class_event["ends_at"] <= $wc->formatYMDTime($weekday['dt_end'])) {
      $events[] = $class_event;
    }
  }
  $wc->weeks[$week_choice][$weekday_key]['class_events'] = $events;
}


// set up for navigating forward and backwards through the weeks
$prev_index = $week_choice - 1;
$next_index = $week_choice + 1;

$has_prev = isset($wc->weeks[$prev_index]);
$has_next = isset($wc->weeks[$next_index]);

$base_params = ['class_choice' => $class_choice];

$prev_url = '?' . http_build_query($base_params + ['week_of' => $has_prev ? $wc->weeks[$prev_index]['id'] : '']);
$next_url = '?' . http_build_query($base_params + ['week_of' => $has_next ? $wc->weeks[$next_index]['id'] : '']);



view('booking/index.view.php', [
	'heading' => 'Upcoming classes',
	'class_types' => $class_types,
  'class_choice' => $class_choice,
  'week' => (array_slice($wc->weeks[$week_choice], 2)), 
  'week_choice' => $week_choice,
  'has_prev' => $has_prev,
  'has_next' => $has_next,
  'prev_url' => $prev_url,
  'next_url' => $next_url,
]);
