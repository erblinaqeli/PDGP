<?php
if (isset($_POST["req"])) {
  // (A) LOAD LIBRARY
  require "2-cal-lib.php";
  switch ($_POST["req"]) {
    // (B) INVALID REQUEST
    default : echo "Invalid request"; break;

    // (C) GET DATES & EVENTS FOR SELECTED PERIOD
    case "get":
      echo json_encode($_CAL->get($_POST["month"], $_POST["year"]));
      break;

    // (D) SAVE EVENT
    case "save":
      echo $_CAL->save(
        $_POST["start"], $_POST["end"], $_POST["txt"], $_POST["color"], $_POST["bg"],
        isset($_POST["id"]) ? $_POST["id"] : null
      ) ? "OK" : $_CAL->error ;
      break;

    // (E) DELETE EVENT
    case "del":
      echo $_CAL->del($_POST["id"])  ? "OK" : $_CAL->error ;
      break;
  }
}