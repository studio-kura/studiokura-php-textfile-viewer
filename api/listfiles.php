<?php
$config = include('config.php');
$categories = [
  'taiken' => '体験',
  'reservation' => '予約',
];
$entries = [];
foreach (glob($config['path'] . '*.txt') as $entry) {
  $filename = str_replace($config['path'], '', $entry);
  $chunks = explode('-', $filename);
  $category = $chunks[0];
  $datetime = 'unknown';
  if (count($chunks) > 6) {
    $seconds = str_replace('.txt', '', $chunks[6]);
    $datetime = "$chunks[1]-$chunks[2]-$chunks[3] $chunks[4]:$chunks[5]:$seconds";
  }
  $title = $categories[$category] . ' ' . $datetime;
  $entries[] = [
    'title' => $title,
    'filepath' => $entry,
    'filename' => $filename,
    'category' => $category,
    'datetime' => $datetime,
  ];
}
function cmp($a, $b)
{
  if ($a['datetime'] == $b['datetime']) {
    return 0;
  }
  return ($a['datetime'] > $b['datetime']) ? -1 : 1;
}
usort($entries, "cmp");
return $entries;
