<!DOCTYPE html>
<html>
  <head>
    <title>Calendar Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5">
    <link rel="icon" type="image/png" href="favicon.png">

    <!-- ANDROID + CHROME + APPLE + WINDOWS APP -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="white">
    <link rel="apple-touch-icon" href="icon-512.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Calendar">
    <meta name="msapplication-TileImage" content="icon-512.png">
    <meta name="msapplication-TileColor" content="#ffffff">

    <!-- WEB APP MANIFEST -->
    <!-- https://web.dev/add-manifest/ -->
    <link rel="manifest" href="5-manifest.json">

    <!-- SERVICE WORKER -->
    <script>
    if ("serviceWorker" in navigator) {
      navigator.serviceWorker.register("5-worker.js");
    }
    </script>

    <!-- JS + CSS -->
    <script src="4b-calendar.js"></script>
    <link rel="stylesheet" href="4c-calendar.css">
  </head>
  <body>
    <?php
    // (A) DAYS MONTHS YEAR
    $months = [
      1 => "January", 2 => "Febuary", 3 => "March", 4 => "April",
      5 => "May", 6 => "June", 7 => "July", 8 => "August",
      9 => "September", 10 => "October", 11 => "November", 12 => "December"
    ];
    $monthNow = date("m");
    $yearNow = date("Y"); ?>

    <!-- (B) PERIOD SELECTOR -->
    <div id="calPeriod">
      <select id="calMonth"><?php foreach ($months as $m=>$mth) {
        printf("<option value='%u'%s>%s</option>",
          $m, $m==$monthNow?" selected":"", $mth
        );
      } ?></select>
      <input id="calYear" type="number" value="<?=$yearNow?>">
      <input id="calAdd" type="button" value="+">
    </div>

    <!-- (C) CALENDAR WRAPPER -->
    <div id="calWrap"></div>

    <!-- (D) EVENT FORM -->
    <div id="calForm"><form>
      <div id="evtCX">X</div>
      <input type="hidden" id="evtID">
      <label>Date Start</label>
      <input id="evtStart" type="datetime-local" required>
      <label>Date End</label>
      <input id="evtEnd" type="datetime-local" required>
      <label>Event</label>
      <input id="evtTxt" type="text" required>
      <label>Text Color</label>
      <input id="evtColor" type="color" value="#000000" required>
      <label>Background Color</label>
      <input id="evtBG" type="color" value="#ffdbdb" required>
      <div id="evtFoot">
        <input type="button" id="evtDel" value="Delete">
        <input type="submit" id="evtSave" value="Save">
      </div>
    </form></div>
  </body>
</html>