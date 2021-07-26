let formUpdate = document.getElementById("formUpdatePassword");
formUpdate.addEventListener("submit", (e) => {
  //alert("hello perro");

  //console.log(data);

  e.preventDefault();
  updatePasswords();
});

async function updatePasswords() {
  let data = new FormData(formUpdate);
  data.append("opc", "actUpdatePass");
  let response = await fetch("../Controller/loginController.php", {
    method: "POST",
    body: data,
  });

  let dataresponse = await response.json();
  notification(dataresponse);
  cleanform();
}

function notification(data) {
  if (data == 1) {
    swal("Genial!", "Sus datos ha sido actualizado correctamente!", "success");
  }
  if (data == 2) {
    swal("Noo!", "Ingrese correctamente su contraseña anterior!", "error");
  } else {
    swal(
      "Noo!",
      "Sus datos no ha sido posible actualizado correctamente!",
      "error"
    );
  }
}

function cleanform() {
  let myformPass = document.getElementById("formUpdatePassword");
  myformPass.reset();
}
