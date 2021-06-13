$(function () {
  let tableinvent = $("#inventariotabla").DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
    },
    scrollX: false,
    dom: '<"header__main"<"search"f>>t<"header__main"ip>',
    lengthChange: false,
    pageLength: 5,
    ajax: {
      url: "../Controller/inventarioController.php?opc=listInvent",
      dataSrc: "",
    },
    columns: [
      { data: null },
      { data: "nombre" },
      { data: "composicion" },
      { data: "forma" },
      { data: "cantidad" },
      { data: "fecha" },
      { data: null },
    ],
    columnDefs: [
      {
        defaultContent:
          '<button class="editar_b btn-success"><i class="fas fa-edit editar"></i></button> <button class="eliminar_b"><i class="fas fa-trash-alt eliminar"></i></button>',
        targets: -1,
      },
    ],
  });
  tableinvent
    .on("order.dt search.dt", function () {
      tableinvent
        .column(0, { search: "applied", order: "applied" })
        .nodes()
        .each(function (cell, i) {
          cell.innerHTML = i + 1;
        });
    })
    .draw();
  ///////////////:::::::::::::here edit user
  $("#inventariotabla tbody").on("click", ".editar_b", function () {
    //alert("hello");
    let data = tableinvent.row($(this).parents("tr")).data();
    $("#id").val(data["id"]);
    //console.log(data["id"]);
    $("#name").val(data["nombre"]);
    $("#composicion").val(data["composicion"]);
    //console.log(data["user_level"]);
    $("#forma").val(data["forma"]);
    $("#cantidad").val(data["cantidad"]);
    $("#fecha").val(data["fecha"]);
    //console.log(data["id"]);

    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Producto");
    $("#modalNewInvent").modal("show");
  });

  $("#inventariotabla tbody").on("click", ".eliminar_b", function () {
    let data = tableinvent.row($(this).parents("tr")).data();
    let id = data["id"];
    var formData = new FormData();
    formData.append("id", id);
    formData.append("opc", "deleteinvent");

    $.ajax({
      type: "POST",
      url: "../Controller/inventarioController.php",
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
          $("#inventariotabla").DataTable().ajax.reload(null, false);
        });
      },
    });
  });
  //end func
});
/* FORM DATA MODEL */
let newUser = document.getElementById("NewInvent");

let savenewuser = document.getElementById("formNewInvent");
/*-- Modal */
let modal = document.getElementById("modalNewInvent");
//let formNewUser = document.getElementById("formNewUser");
/*-- END Modal */
/*SELECT MODAL*/

/*END SELECT MODAL*/
newUser.addEventListener("click", (event) => {
  //event.preventDefault();
  $("#formNewInvent").trigger("reset");
  $(".modal-header").css("background-color", "#00a000");
  $(".modal-header").css("color", "white");
  $(".modal-title").text("Nuevo Producto");
  $("#modalNewInvent").modal("show");
});

/* form */
//savenewuser.addEventListener("submit", (event) => {
$("#formNewInvent").submit(function (event) {
  event.preventDefault();
  let id = document.getElementById("id").value;
  var formData = new FormData(savenewuser);
  formData.append("opc", "NewInvent");
  //formData.append("opc", "newUser");
  $.ajax({
    type: "post",
    url: "../Controller/inventarioController.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      console.log(response);
      let result = JSON.parse(response);
      $("#modalNewInvent").modal("hide");
      //$(".modal-backdrop").hide();
      swal({
        title: result.title,
        text: result.text,
        icon: result.icon,
      }).then(function () {
        $("#inventariotabla").DataTable().ajax.reload(null, false);
      });
    },
  });
  return false;
});
