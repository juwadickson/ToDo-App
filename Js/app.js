function verifyFnameFormat() {
  const fname = document.getElementById("fname");
  const display = document.getElementById("firstNameFormat");

  if (!/^[a-zA-z]+$/.test(fname.value)) {
    display.innerHTML = "Invalid input: number detected";
  } else {
    display.innerHTML = "";
  }
}

function verifyLnameFormat() {
  const lname = document.getElementById("lname");
  const display = document.getElementById("lastNameFormat");

  if (!/^[a-zA-z]+$/.test(lname.value)) {
    display.innerHTML = "Invalid input: number detected";
  } else {
    display.innerHTML = "";
  }
}

function verifyOnameFormat() {
  const oname = document.getElementById("oname");
  const display = document.getElementById("otherNameFormat");

  if (!/^[a-zA-z]+$/.test(oname.value)) {
    display.innerHTML = "Invalid input: number detected";
  } else {
    display.innerHTML = "";
  }
}

function dropdown() {
  const dropdownContent = document.getElementById("dropdown-content");
  const up = document.getElementById("up");
  const down = document.getElementById("down");

  if (dropdownContent.style.visibility == "hidden") {
    dropdownContent.style.visibility = "visible";
    down.style.visibility = "hidden";
    up.style.visibility = "visible";
  } else {
    dropdownContent.style.visibility = "hidden";
    up.style.visibility = "hidden";
    down.style.visibility = "visible";
  }
}

function showHideNav() {
  const nav = document.getElementById("nav");

  if (nav.style.display == "none") {
    nav.style.display = "flex";
  } else {
    nav.style.display = "none";
  }
}
