$(function () {
  let tableinvent = $("#categoriatabla").DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
    },
    scrollX: false,
    dom: '<"header__main"<"search"f>>t<"header__main"ip>',
    lengthChange: false,
    pageLength: 5,
    ajax: {
      url: "../Controller/categoriaControlller.php?opc=listCat",
      dataSrc: "",
    },
    columns: [
      { data: null },
      { data: "descripcion" },
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
  $("#categoriatabla tbody").on("click", ".editar_b", function () {
    //alert("hello");
    let data = tableinvent.row($(this).parents("tr")).data();
    $("#id").val(data["id"]);
    //console.log(data["id"]);
    $("#descripcion").val(data["descripcion"]);
    //console.log(data["id"]);

    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Cetegoria");
    $("#modalNewCat").modal("show");
  });

  $("#categoriatabla tbody").on("click", ".eliminar_b", function () {
    let data = tableinvent.row($(this).parents("tr")).data();
    let id = data["id"];
    var formData = new FormData();
    formData.append("id", id);
    formData.append("opc", "deletecat");

    $.ajax({
      type: "POST",
      url: "../Controller/categoriaControlller.php",
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
          $("#categoriatabla").DataTable().ajax.reload(null, false);
        });
      },
    });
  });
  //end func
});
/* FORM DATA MODEL */
let newUser = document.getElementById("NewCat");

let savenewuser = document.getElementById("formNewCat");
/*-- Modal */
let modal = document.getElementById("modalNewCat");
//let formNewUser = document.getElementById("formNewUser");
/*-- END Modal */
/*SELECT MODAL*/

/*END SELECT MODAL*/
newUser.addEventListener("click", (event) => {
  //event.preventDefault();
  $("#formNewInvent").trigger("reset");
  $(".modal-header").css("background-color", "#00a000");
  $(".modal-header").css("color", "white");
  $(".modal-title").text("Nueva Categoria");
  $("#modalNewCat").modal("show");
});

/* form */
//savenewuser.addEventListener("submit", (event) => {
$("#formNewCat").submit(function (event) {
  event.preventDefault();
  let id = document.getElementById("id").value;
  var formData = new FormData(savenewuser);
  formData.append("opc", "newCat");
  //formData.append("opc", "newUser");
  $.ajax({
    type: "post",
    url: "../Controller/categoriaControlller.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      console.log(response);
      let result = JSON.parse(response);
      $("#modalNewCat").modal("hide");
      //$(".modal-backdrop").hide();
      swal({
        title: result.title,
        text: result.text,
        icon: result.icon,
      }).then(function () {
        $("#categoriatabla").DataTable().ajax.reload(null, false);
      });
    },
  });
  return false;
});