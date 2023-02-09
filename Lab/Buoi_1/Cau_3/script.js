function chkfN(input) {
  var name = document.getElementById(input);
  var pos = name.value;

  if (pos == "") {
    name.style.borderColor = "red";
    return false;
  } else {
    name.style.borderColor = "";
    return true;
  }
}

const submitBtn = document.getElementById("submitBtn");
submitBtn.addEventListener("click", function () {
  chkfN("nameInputID");
  chkfN("addressInputID");
  chkfN("PIDInputID");
});
