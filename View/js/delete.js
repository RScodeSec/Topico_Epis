$("#formPersonas").submit(function (e) {
  e.preventDefault();
  let aoption = $("#id").val();
  let username = $("#username").val();
  let password = $("#password").val();
  let level = $("#leveluser").val();
  let name = $("#name").val();
  let phone = $("#phone").val();
  let data = {
    aoption: aoption,
    action: "newuser",
    username: username,
    password: password,
    level: level,
    name: name,
    phone: phone,
  };

  $.ajax({
    type: "POST",
    url: "../controller/userController.php",
    data: data,
    success: function (response) {
      let result = JSON.parse(response);
      swal({
        title: result.title,
        text: result.text,
        icon: result.icon,
      }).then(function () {
        $("#modalCRUD").modal("hide");
        $("#productosTabla").DataTable().ajax.reload(null, false);
      });
    },
  });
  return false;
});
