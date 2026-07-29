<?php
redirect_if_not_logged_in();

$db = $container->resolve('Core\Database');
$class_types = $db->getAll("SELECT id, title FROM class_types");
$class_choice = filter_input(INPUT_GET, 'class_choice', FILTER_VALIDATE_INT) ?? 0;
$week_of = filter_input(INPUT_GET, 'week_of', FILTER_VALIDATE_INT) ?? 0;

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


if (isset($class_choice) && $class_choice != 0){
	$sql= $sql_base . "AND class_events.class_type_id= :class_type_id ORDER BY class_events.starts_at";
	$params =[
    'class_type_id' => $class_choice, 
    'todays_date' => $wm->formatDate($wm->today),
    'week_start' => $wm->formatDate($wm->weeks[$week_of]['sun']['dt']),
    'week_end' => $wm->formatDateTime($wm->weeks[$week_of]['sat']['dt_end']),
    ];
} else{
	$sql= $sql_base. "ORDER BY class_events.starts_at";
	$params =[
    'todays_date' => $wm->formatDate($wm->today),
    'week_start' => $wm->formatDate($wm->weeks[$week_of]['sun']['dt']),
    'week_end' => $wm->formatDateTime($wm->weeks[$week_of]['sat']['dt_end']),
    ];
}
$classes = $db->getAll($sql,$params);

// insert classes into weekly calendar
foreach (array_slice($wm->weeks[$week_of], 2) as $weekday_key => $weekday) {
  $events = [];
  
  foreach ($classes as $class_event) {
    if ($class_event["starts_at"] >= $wm->formatDateTime($weekday['dt']) &&  $class_event["ends_at"] <= $wm->formatDateTime($weekday['dt_end'])) {
      $events[] = $class_event;
    }
  }
  $wm->weeks[$week_of][$weekday_key]['class_events'] = $events;
}


// set up for navigating fprward and backwards through the weeks
$current_index = null;
foreach ($wm->weeks as $i => $week) {
    if ((string)$week['id'] === (string)$week_of) {
        $current_index = $i;
        break;
    }
}

$prev_index = $current_index - 1;
$next_index = $current_index + 1;

$has_prev = isset($wm->weeks[$prev_index]);
$has_next = isset($wm->weeks[$next_index]);

$base_params = ['class_choice' => $class_choice];

$prev_url = '?' . http_build_query($base_params + ['week_of' => $has_prev ? $wm->weeks[$prev_index]['id'] : '']);
$next_url = '?' . http_build_query($base_params + ['week_of' => $has_next ? $wm->weeks[$next_index]['id'] : '']);



view('booking/index.view.php', [
	'heading' => 'Upcoming classes',
	'class_types' => $class_types,
	'classes' => $classes,
  'weeks' => $wm->weeks,
  'week_selected' => $wm->weeks[$week_of],
  'class_choice' => $class_choice,
  'week_choice' => $week_of,
  'has_prev' => $has_prev,
  'has_next' => $has_next,
  'prev_url' => $prev_url,
  'next_url' => $next_url,
  'current_index' => $current_index,
]);
