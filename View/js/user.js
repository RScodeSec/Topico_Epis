$(function () {
  let tableProd = $("#productosTabla").DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
    },
    scrollX: false,
    dom: '<"header__main"<"search"f>>t<"header__main"ip>',
    lengthChange: false,
    pageLength: 5,
    ajax: {
      url: "../Controller/userController.php?opc=listUser",
      dataSrc: "",
    },
    columns: [
      { data: null },
      { data: "nombres" },
      { data: "group_name" },
      { data: "dni" },
      { data: "edad" },
      { data: "sexo" },
      { data: "peso" },
      { data: "talla" },
      { data: null },
    ],
    columnDefs: [
      {
        defaultContent:
          '<button class="editar_b btn-success"><i class="fas fa-edit editar"></i></button> <button class="eliminar_b"><i class="fas fa-trash-alt eliminar"></i></button>',
        targets: -1,
      },
      /*{
        data: null,
        targets: -2,
        defaultContent:
          '<button class="editar_b table-e"><i class="fas fa-edit editar"></i></button>',
      },*/
    ],
  });
  tableProd
    .on("order.dt search.dt", function () {
      tableProd
        .column(0, { search: "applied", order: "applied" })
        .nodes()
        .each(function (cell, i) {
          cell.innerHTML = i + 1;
        });
    })
    .draw();

  //NO TOCAR GAA::::::::::::::::::
  /* $("#btnNuevo").click(function () {
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Usuario");
    $("#modalCRUD").modal("show");
    id = null;
    opcion = 1; //alta
  });*/
  ///////////////:::::::::::::here edit user
  $("#productosTabla tbody").on("click", ".editar_b", function () {
    //alert("hello");
    let data = tableProd.row($(this).parents("tr")).data();
    $("#id").val(data["id"]);
    $("#name").val(data["nombres"]);
    $("#typeUser").val(data["user_level"]);
    //console.log(data["user_level"]);
    $("#dni").val(data["dni"]);
    $("#age").val(data["edad"]);
    $("#gender").val(data["sexo"]);
    $("#peso").val(data["peso"]);
    $("#talla").val(data["talla"]);
    //console.log(data["id"]);

    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Usuario");
    $("#modalNewUser").modal("show");
  });

  $("#productosTabla tbody").on("click", ".eliminar_b", function () {
    let data = tableProd.row($(this).parents("tr")).data();
    let id = data["id"];
    var formData = new FormData();
    formData.append("id", id);
    formData.append("opc", "deleteUser");

    $.ajax({
      type: "POST",
      url: "../Controller/userController.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        let result = JSON.parse(response);
        swal({
          title: result.title,
          text: result.text,
          icon: result.icon,
        }).then(function () {
          $("#productosTabla").DataTable().ajax.reload(null, false);
        });
      },
    });
  });
  //end func
});
/* FORM DATA MODEL */
let newUser = document.getElementById("NewUser");

let savenewuser = document.getElementById("formNewUser");
/*-- Modal */
let modal = document.getElementById("modalNewUser");
//let formNewUser = document.getElementById("formNewUser");
/*-- END Modal */
/*SELECT MODAL*/

/*END SELECT MODAL*/
newUser.addEventListener("click", (event) => {
  //event.preventDefault();
  $("#formNewUser").trigger("reset");
  $(".modal-header").css("background-color", "#00a000");
  $(".modal-header").css("color", "white");
  $(".modal-title").text("Nueva Usuario");
  $("#modalNewUser").modal("show");
});

/* form */
//savenewuser.addEventListener("submit", (event) => {
$("#formNewUser").submit(function (event) {
  event.preventDefault();
  let id = document.getElementById("id").value;
  var formData = new FormData(savenewuser);
  formData.append("opc", "newUser");
  //formData.append("opc", "newUser");
  $.ajax({
    type: "post",
    url: "../Controller/userController.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      console.log(response);
      let result = JSON.parse(response);
      $("#modalNewUser").modal("hide");
      //$(".modal-backdrop").hide();
      swal({
        title: result.title,
        text: result.text,
        icon: result.icon,
      }).then(function () {
        $("#productosTabla").DataTable().ajax.reload(null, false);
      });
    },
  });
  return false;
});
