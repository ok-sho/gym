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
    for ($wk=0; $wk < $number_of_weeks; $wk++) {
      $days=[];
      for ($day=0; $day <= 7; $day++) {
        $days[] = [
          'dt' => $this->getWeekDay($wk, $day),
          'dt_end' => $this->getEndOfDay($this->getWeekDay($wk, $day)),
          'str' => $this->formatDayDateMonth($this->getWeekDay($wk, $day)),
          'class_events' => [],
        ];
      }
      $this->weeks[] = [
        'id' => $wk,
        "date_string" => $this->formatYMD($this->getWeekDay($wk)),
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

  public function formatYMD(DateTimeImmutable $date):string {
    return $date->format("Y-m-d");
  }

  public function formatYMDTime(DateTimeImmutable $date):string {
    return $date->format("Y-m-d H:i:s");
  }

  public function formatDayDateMonth(DateTimeImmutable $date):string {
    return $date->format("D d M");
  }

} 
