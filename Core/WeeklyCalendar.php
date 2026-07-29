<?php

namespace Core;

use DateTimeImmutable;
use DateTimeZone;

class WeeklyCalendar {
  public DateTimeZone $timeZone;
  public DateTimeImmutable $today;
  public DateTimeImmutable $thisWeekStart;
  public array $weeks=[];

  public function __construct(string $location = "America/Vancouver"){
    $this->timeZone = new DateTimeZone($location);
    $this->today = new DateTimeImmutable("today", $this->timeZone);

    if ($this->today->format("l") == "Sunday"){
      $this->thisWeekStart = new DateTimeImmutable("today", $this->timeZone);
    } else {
      $this->thisWeekStart = new DateTimeImmutable("last sunday", $this->timeZone);
    }
    $this->makeWeeksArray();
  }

  public function getWeekDay(int $weeksFromNow = 0, int $daysFromSunday = 0): DateTimeImmutable {
    if ($weeksFromNow == 0 && $daysFromSunday == 0){
      return $this->thisWeekStart;
    }
    return $this->thisWeekStart->modify("+".$weeksFromNow." weeks +".$daysFromSunday." days");
  }

  public function getWeekEnd(int $weeksFromNow = 0): DateTimeImmutable {
    return $this->thisWeekStart->modify("+".$weeksFromNow." weeks +6 days +23 hours +59 minutes +59 seconds");
  }

  public function getEndOfDay(DateTimeImmutable $day){
    return $day->modify("+23 hours +59 minutes +59 seconds");
  }

  public function makeWeeksArray(int $number_of_weeks = 8){
    for ($i=0; $i < $number_of_weeks; $i++) {
      $days=[];
      for ($j=0; $j <= 7; $j++) {
        $days[] = [
          'dt' => $this->getWeekDay($i, $j),
          'dt_end' => $this->getEndOfDay($this->getWeekDay($i, $j)),
          'str' => $this->formatDateForCalendar($this->getWeekDay($i, $j)),
          'class_events' => [],
        ];
      }
      $this->weeks[] = [
        'id' => $i,
        "date_string" => $this->formatDate($this->getWeekDay($i)),
        "sun" => $days[0],
        "mon" => $days[1],
        "tue" => $days[2],
        "wed" => $days[3],
        "thu" => $days[4],
        "fri" => $days[5],
        "sat" => $days[6],
      ];
    }
  }

  public function formatDate(DateTimeImmutable $date):string {
    return $date->format("Y-m-d");
  }

  public function formatDateTime(DateTimeImmutable $date):string {
    return $date->format("Y-m-d H:i:s");
  }

  public function formatDateForCalendar(DateTimeImmutable $date):string {
    return $date->format("D d M");
  }

} 
