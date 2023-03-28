var findBtn = document.getElementById("findBtn");
var replaceBtn = document.getElementById("replaceBtn");

var input = document.getElementById("inputID");
var pattern = document.getElementById("patternID");
var output = document.getElementById("outputID");

function find(input, patt) {
  patt = new RegExp(patt, "ig");
  console.log(patt);
  if (input.match(patt)) {
    console.log("Match!!!");
  } else {
    console.log("NOT match!!!");
  }
}

function replaceSpecialChar(input) {
  return input.replace(/[^a-zA-Z0-9]/g, "");
}

findBtn.addEventListener("click", function () {
  find(input.value, pattern.value);
});

replaceBtn.addEventListener("click", function () {
  output.value = replaceSpecialChar(input.value);
});

var mssvPatt = "/^SVd{5}[.]$/";
var emailPatt = "^[w-.]+@([w-]+.)+[w-]{2,4}$";
var sdtPatt = "^0d{8,9}";
