const submitBtn = document.getElementById("submitBtn");

var nameInput = document.getElementById("nameInputID");
var addressInput = document.getElementById("addressInputID");
var PIDInput = document.getElementById("PIDInputID");

function chkRegex(obj, regex) {}

function chkFocusOut(obj) {
  if (obj.value == "") {
    obj.style.borderColor = "red";
    return false;
  } else {
    obj.style.borderColor = "";
    return true;
  }
}

nameInput.addEventListener("focusout", function () {
  chkFocusOut(nameInput);
});

addressInput.addEventListener("focusout", function () {
  chkFocusOut(addressInput);
});

PIDInput.addEventListener("focusout", function () {
  chkFocusOut(PIDInput);
});

function chkfN(obj) {
  var pos = obj.value;
  if (pos == "") {
    obj.style.borderColor = "red";
    return false;
  } else {
    obj.style.borderColor = "";
    return true;
  }
}

function chkFocus(obj) {
  var pos = obj.value;
  if (pos == "") {
    obj.focus();
    return false;
  } else {
    obj.style.borderColor = "";
    return true;
  }
}

submitBtn.addEventListener("click", function () {
  chkfN(nameInput);
  chkfN(addressInput);
  chkfN(PIDInput);

  if (!chkFocus(nameInput)) {
    return false;
  }
  if (!chkFocus(addressInput)) {
    return false;
  }
  if (!chkFocus(PIDInput)) {
    return false;
  }
});
