$(document).ready(function () {
  loadComments();

  $("#submitComment").click(function () {
    var comment = $("#comment").val();

    $.ajax({
      url: "src/saveComments.php",
      type: "POST",
      data: { comment: comment },
      success: function (response) {
        $("#comment").val("");
        loadComments();
        alert(response);
      },
      error: function () {
        alert("Error al enviar el comentario.");
      },
    });
  });
});

function loadComments() {
  $.ajax({
    url: "src/getComments.php",
    type: "GET",
    success: function (data) {
      $("#commentsList").html(data);
    },
  });
}
