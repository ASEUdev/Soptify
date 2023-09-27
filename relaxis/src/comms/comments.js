$(document).ready(function () {
  loadComments();

  $("#submitComment").click(function () {
    var comment = $("#comment").val();

    $.ajax({
      url: "src/comms/saveComments.php",
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
    url: "src/comms/getComments.php",
    type: "GET",
    success: function (data) {
      $("#commentsList").html(data);
    },
  });
}
