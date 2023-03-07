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

$(document).ready(function () {
  jQuery("#idFrmTinh").submit(function (e) {
    $.ajax({
      type: "GET",
      url: "xuLyTinhToan.php",
      data: $(this).serialize(),
      success: function (result) {
        $("#ketQua").html(result);
      },
    });
    e.preventDefault();
  });
});
