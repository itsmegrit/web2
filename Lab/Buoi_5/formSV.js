var dkyBtn = document.getElementById("dangKyBtn");

var mssv = document.getElementById("MSSVID");
var hoTen = document.getElementById("hoTenID");
var email = document.getElementById("emailID");
var SDT = document.getElementById("SDTID");

function chkRegex(input, patt) {
  patt = new RegExp(patt, "ig");
  console.log(patt);
  if (input.match(patt)) {
    return true;
  }
  return false;
}
function chkForm() {
  var mssvPatt = "^SV[0-9]{5}[.]$";
  var emailPatt = "^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$";
  var sdtPatt = "^0d{8,9}";

  if (!chkRegex(mssv.value, mssvPatt)) {
    console.log("MSSV Sai");
  }
  if (!chkRegex(email.value, emailPatt)) {
    console.log("email Sai");
  }
  if (!chkRegex(SDT.value, sdtPatt)) {
    console.log("SDT Sai");
  }
}

dkyBtn.addEventListener("click", function () {
  chkForm();
});
