<?php
class Calendar {
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
  private $pdo = null;
  private $stmt = null;
  public $error = "";
  function __construct () { try {
    $this->pdo = new PDO(
      "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
      DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  } catch (Exception $ex) { exit($ex->getMessage()); }}

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct () {
    if ($this->stmt!==null) { $this->stmt = null; }
    if ($this->pdo!==null) { $this->pdo = null; }
  }

  // (C) HELPER - RUN SQL QUERY
  function query ($sql, $data=null) {
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($data);
  }

  // (D) SAVE EVENT
  function save ($start, $end, $txt, $color, $bg, $id=null) {
    // (D1) START & END DATE CHECK
    if (strtotime($end) < strtotime($start)) {
      $this->error = "End date cannot be earlier than start date";
      return false;
    }

    // (D2) RUN SQL
    if ($id==null) {
      $sql = "INSERT INTO `events` (`evt_start`, `evt_end`, `evt_text`, `evt_color`, `evt_bg`) VALUES (?,?,?,?,?)";
      $data = [$start, $end, $txt, $color, $bg];
    } else {
      $sql = "UPDATE `events` SET `evt_start`=?, `evt_end`=?, `evt_text`=?, `evt_color`=?, `evt_bg`=? WHERE `evt_id`=?";
      $data = [$start, $end, $txt, $color, $bg, $id];
    }
    $this->query($sql, $data);
    return true;
  }

  // (E) DELETE EVENT
  function del ($id) {
    $this->query("DELETE FROM `events` WHERE `evt_id`=?", [$id]);
    return true;
  }

  // (F) GET DATES & EVENTS FOR SELECTED PERIOD
  function get ($month, $year) {
    // (F1) DATA STRUCTURE
    $cells = []; // "b" blank cell
                 // "d" day number
                 // "t" today
                 // "e" => [event ids]
    $events = []; // event id => data
    $map = []; // "yyyy-mm-dd" => $cells[n]

    // (F2) DATE RANGE CALCULATIONS
    $month = $month<10 ? "0$month" : $month ;
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $dateYM = "{$year}-{$month}-";
    $dateFirst = $dateYM . "01";
    $dateLast = $dateYM . $daysInMonth;
    $dayFirst = (new DateTime($dateFirst))->format("w");
    $dayLast = (new DateTime($dateLast))->format("w");
    $nowDay = (date("n")==$month && date("Y")==$year) ? date("j") : 0 ;

    // (F3) PAD EMPTY CELLS BEFORE FIRST DAY OF MONTH
    if (SUN_FIRST) { $pad = $dayFirst; }
    else { $pad = $dayFirst==0 ? 6 : $dayFirst-1 ; }
    for ($i=0; $i<$pad; $i++) { $cells[] = ["b" => 1]; }

    // (F4) DAYS IN MONTH
    for ($day=1; $day<=$daysInMonth; $day++) {
      $i = count($cells);
      $map["$year-$month-".($day<10?"0$day":$day)] = $i;
      $cells[] = ["d" => $day];
      if ($day == $nowDay) { $cells[$i]["t"] = 1; }
    }

    // (F5) PAD EMPTY CELLS AFTER LAST DAY OF MONTH
    if (SUN_FIRST) { $pad = $dayLast==0 ? 6 : 6-$dayLast ; }
    else { $pad = $dayLast==0 ? 0 : 7-$dayLast ; }
    for ($i=0; $i<$pad; $i++) { $cells[] = ["b" => 1]; }

    // (F6) GET EVENTS
    $start = "$dateFirst 00:00:00";
    $end = "$dateLast 23:59:59";
    $this->query("SELECT * FROM `events` WHERE (
      (`evt_start` BETWEEN ? AND ?)
      OR (`evt_end` BETWEEN ? AND ?)
      OR (`evt_start` <= ? AND `evt_end` >= ?)
    )", [$start, $end, $start, $end, $start, $end]);

    while ($r = $this->stmt->fetch()) {
      // (F6-1) "SAVE" $EVENTS DETAILS
      $events[$r["evt_id"]] = [
        "s" => $r["evt_start"], "e" => $r["evt_end"],
        "c" => $r["evt_color"], "b" => $r["evt_bg"],
        "t" => $r["evt_text"]
      ];

      // (F6-2) "MAP" EVENTS TO $CELLS
      $start = substr($r["evt_start"], 5, 2)==$month ? (int)substr($r["evt_start"], 8, 2) : 1 ;
      $end = substr($r["evt_end"], 5, 2)==$month ? (int)substr($r["evt_end"], 8, 2) : 1 ;
      for ($d=$start; $d<=$end; $d++) {
        $eday = $dateYM . ($d<10?"0$d":$d);
        if (!isset($cells[$map[$eday]]["e"])) { $cells[$map[$eday]]["e"] = []; }
        $cells[$map[$eday]]["e"][] = $r["evt_id"];
      }
    }

    // (F7) RESULTS
    return ["s"=>SUN_FIRST, "e" => $events, "c" => $cells];
  }
}

// (G) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "test");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// (H) SUNDAY FIRST
define("SUN_FIRST", true);

// (I) NEW CALENDAR OBJECT
$_CAL = new Calendar();