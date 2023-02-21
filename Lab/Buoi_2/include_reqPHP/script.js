$("#homePage").click(function () {
  $.ajax({
    type: "GET",
    url: "bodyContent.php",
    data: {
      id: "homePage",
    },
    success: function (result) {
      console.log(result);
      $("#mid-mid").html(result);
    },
  });
});

$("#info1").click(function () {
  $.ajax({
    type: "GET",
    url: "bodyContent.php",
    data: {
      id: "info1",
    },
    success: function (result) {
      console.log(result);
      $("#mid-mid").html(result);
    },
  });
});
$("#info2").click(function () {
  $.ajax({
    type: "GET",
    url: "bodyContent.php",
    data: {
      id: "info2",
    },
    success: function (result) {
      console.log(result);
      $("#mid-mid").html(result);
    },
  });
});
$("#contact").click(function () {
  $.ajax({
    type: "GET",
    url: "bodyContent.php",
    data: {
      id: "contact",
    },
    success: function (result) {
      console.log(result);
      $("#mid-mid").html(result);
    },
  });
});
