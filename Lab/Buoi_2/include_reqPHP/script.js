$(".direction").click(function () {
  $.ajax({
    type: "GET",
    data: {
      id: this.id,
    },
    url: "bodyContent.php",
    success: function (result) {
      $("#mid-mid").html(result);
    },
  });
});

$("#idFrmTinh").submit(function (e) {
  e.preventDefault();
  var form = $(this);
  $.ajax({
    type: "GET",
    url: "xuLyTinhToan.php",
    data: form.serialize(),
    success: function (result) {
      $("#tinhToanArea").html(result);
    },
  });
});
