var cal = {
  // (A) PROPERTIES
  events : null, // events data for current month/year
  hMth : null, hYear : null, // html month & year
  hWrap : null, // html calendar wrapper
  // html form & fields
  hFormWrap : null, hForm : null, hfID : null, 
  hfStart : null, hfEnd : null, hfTxt : null,
  hfColor : null, hfBG : null, hfDel : null,

  // (B) SUPPORT FUNCTION - AJAX FETCH
  ajax : (data, onload) => {
    // (B1) FORM DATA
    let form = new FormData();
    for (let [k,v] of Object.entries(data)) { form.append(k,v); }

    // (B2) FETCH
    fetch("3-cal-ajax.php", { method:"POST", body:form })
    .then(res=>res.text()).then(onload);
  },

  // (C) INIT CALENDAR
  init : () => {
    // (C1) GET HTML ELEMENTS
    cal.hMth = document.getElementById("calMonth");
    cal.hYear = document.getElementById("calYear");
    cal.hWrap = document.getElementById("calWrap");
    cal.hFormWrap = document.getElementById("calForm");
    cal.hForm = cal.hFormWrap.querySelector("form");
    cal.hfID = document.getElementById("evtID");
    cal.hfStart = document.getElementById("evtStart");
    cal.hfEnd = document.getElementById("evtEnd");
    cal.hfTxt = document.getElementById("evtTxt");
    cal.hfColor = document.getElementById("evtColor");
    cal.hfBG = document.getElementById("evtBG");
    cal.hfDel = document.getElementById("evtDel");

    // (C2) ATTACH CONTROLS
    cal.hMth.onchange = cal.draw;
    cal.hYear.onchange = cal.draw;
    document.getElementById("calAdd").onclick = () => { cal.show(); };
    cal.hForm.onsubmit = () => { return cal.save(); };
    document.getElementById("evtCX").onclick = () => { cal.hFormWrap.classList.remove("show"); };
    cal.hfDel.onclick = cal.del;

    // (C3) DRAW CALENDAR
    cal.draw();
  },

  // (D) DRAW CALENDAR
  draw : () => {
    // (D1) FETCH DATA
    cal.ajax({
      req : "get", month : cal.hMth.value, year : cal.hYear.value
    }, data => {
      // (D2) "UNPACK DATA"
      data = JSON.parse(data);
      let cells = data.c, sunFirst = data.s,
          wrap, row, cell, evt, i = 0;
      cal.events = data.e;
      data = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
      if (sunFirst) { data.unshift("Sun"); }
      else { data.push("Sun"); }

      // (D3) "RESET" CALENDAR
      cal.hWrap.innerHTML = `<div class="calHead"></div>
      <div class="calBody">
        <div class="calRow"></div>
      </div>`;

      // (D4) CALENDAR HEADER - DAY NAMES
      wrap = cal.hWrap.querySelector(".calHead");
      for (let d of data) {
        cell = document.createElement("div");
        cell.className = "calCell";
        cell.innerHTML = d;
        wrap.appendChild(cell);
      }

      // (D5) CALENDAR BODY - INDIVIDUAL DAYS & EVENTS
      wrap = cal.hWrap.querySelector(".calBody");
      row = cal.hWrap.querySelector(".calRow");
      for (let c of cells) {
        // (D5-1) GENERATE CELL
        cell = document.createElement("div");
        cell.className = "calCell";
        if (c.t) { cell.classList.add("calToday"); }
        if (c.b) { cell.classList.add("calBlank"); }
        else {
          cell.innerHTML = `<div class="cellDate">${c.d}</div>
          <div class="cellEvt"></div>`;
        }
        row.appendChild(cell);

        if (c.e) {
          cell = cell.querySelector(".cellEvt");
          for (let id of c.e) {
            evt = document.createElement("div");
            evt.className = "evt";
            evt.style.color = cal.events[id]["c"];
            evt.style.background = cal.events[id]["b"];
            evt.innerHTML = cal.events[id]["t"];
            evt.onclick = () => { cal.show(id); };
            cell.appendChild(evt);
          }
        }
        
        // (D5-2) NEW ROW
        i++;
        if (i%7==0 && i!=cells.length) {
          row = document.createElement("div");
          row.className = "calRow";
          wrap.appendChild(row);
        }
      }
    });
  },
  
  // (E) SHOW EVENT FORM
  show : id => {
    if (id) {
      cal.hfID.value = id;
      cal.hfStart.value = cal.events[id]["s"].replace(" ", "T").substring(0, 16);
      cal.hfEnd.value = cal.events[id]["e"].replace(" ", "T").substring(0, 16);
      cal.hfTxt.value = cal.events[id]["t"];
      cal.hfColor.value = cal.events[id]["c"];
      cal.hfBG.value = cal.events[id]["b"];
      cal.hfDel.style.display = "block";
    } else {
      cal.hForm.reset();
      cal.hfID.value = "";
      cal.hfDel.style.display = "none";
    }
    cal.hFormWrap.classList.add("show");
  },

  // (F) SAVE EVENT
  save : () => {
    // (F1) COLLECT DATA
    var data = {
      req : "save",
      start : cal.hfStart.value,
      end : cal.hfEnd.value,
      txt : cal.hfTxt.value,
      color : cal.hfColor.value,
      bg : cal.hfBG.value
    };
    if (cal.hfID.value != "") { data.id = cal.hfID.value; }

    // (F2) DATE CHECK
    if (new Date(data.start) > new Date(data.end)) {
      alert("Start date cannot be later than end date!");
      return false;
    }

    // (F3) AJAX SAVE
    cal.ajax(data, res => { if (res == "OK") {
      cal.hFormWrap.classList.remove("show");
      cal.draw();
    } else { alert(res); }});
    return false;
  },

  // (G) DELETE EVENT
  del : () => { if (confirm("Delete event?")) {
    cal.ajax({
      req : "del", id : cal.hfID.value
    }, res => { if (res == "OK") {
      cal.hFormWrap.classList.remove("show");
      cal.draw();
    } else { alert(res); }});
  }}
};
window.onload = cal.init;