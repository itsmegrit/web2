$(".navbar").click(function () {
  var navID = this.id;
  $.ajax({
    type: "GET",
    url: "bodyContent.php",
    data: {
      id: navID,
    },
    success: function (result) {
      console.log(result);
      $("#mid-mid").html(result);
    },
  });
});
