let dni = document.getElementById("find-dni");
let button = document.getElementById("searchUser");
//console.log(dni);
//card details
let cardDetails = document.querySelector(".showDetails");
/* 
USER  ______________
*/

button.addEventListener("click", (e) => {
  if (dni.value.length > 0) {
    console.log(dni.value);
    findUser(dni.value);
    //cardDetails.style.display = "block";
  }
  //console.log(dni.value);
});

async function findUser(dni) {
  let response = await fetch(
    "../Controller/attentionController.php?" + "opc=" + "us&dni=" + dni
  );
  let dataresponse = await response.json();
  printUser(dataresponse);
}

function printUser(data) {
  if (data.length > 0) {
    console.log(data);
    document.getElementById("dni").value = data[0].dni;
    document.getElementById("name").value = data[0].nombres;
    document.getElementById("age").value = data[0].edad;
    document.getElementById("peso").value = data[0].peso;
    document.getElementById("talla").value = data[0].talla;
    //console.log(data[0].id);
    //console.log(data[0].dni);
  } else {
    swal("Noo!", "Usuario no Encontrado, Registrelo!!", "info").then(() => {
      window.location.href = "Users.php";
    });
  }
}

/* THIS PART IS SEARCH MEDICAMENT*/

let searchDrug = document.getElementById("drug");
let contentDrug = document.getElementById("contentResultDrugs");

searchDrug.addEventListener("keyup", (event) => {
  if (searchDrug.value.length > 1) {
    console.log(searchDrug.value);
    findDrug(searchDrug.value);
  }
});

async function findDrug(drug) {
  let response = await fetch(
    "../Controller/attentionController.php?" +
      "opc=" +
      "searchDrug&nameDrug=" +
      drug
  );
  let dataresponse = await response.json();
  printdrug(dataresponse);
  //console.log(contentDrug.target);
}

function printdrug(data) {
  let template = "";
  if (data.length > 0) {
    data.forEach((element) => {
      template += `
      <tr class="mydrug">
        <th scope="row"><p>${element.id}</p></th>
        <td>${element.nombre}</td>
        <td>${element.composicion}</td>
        <td>${element.forma}</td>
        <td>${element.cantidad}</td>
      </tr>     
      `;
    });
    contentDrug.innerHTML = template;
  } else {
    contentDrug.innerHTML = "0";
  }
}

/* this part is used for attention drug*/
let drugObjet = {};

let plus = document.getElementById("sumarCant");
let labelCant = document.getElementById("cant");

let cleanDrud = document.getElementById("cleanRecDrug");
let btnCleanDrug = document.getElementById("buttonCleanDrug");

contentDrug.addEventListener("click", (e) => {
  getItem(e);
});

const getItem = (e) => {
  //console.log(e.target.textContent);
  //console.log(e.target.parentElement.firstElementChild.textContent);
  //console.log(e.target.parentElement.cells[0].textContent);
  //console.log(e.target.parentElement.cells[1].textContent);
  //console.log(e.target.parentElement.cells[2].textContent);
  //console.log(e.target.parentElement.outerHTML);
  setdrug(e.target.parentElement.cells);

  e.stopPropagation();
};

const setdrug = (e) => {
  const medicamento = {
    id: e[0].textContent,
    nombre: e[1].textContent,
    composicion: e[2].textContent,
    forma: e[3].textContent,
    cantidad: e[4].textContent,
    pedidoCant: 1,
  };
  drugObjet[medicamento.id] = { ...medicamento };
  pintarMedicamento();
};

pintarMedicamento = () => {
  let valor = 0;
  let template = "";
  Object.values(drugObjet).forEach((element) => {
    valor++;
    template += `
    <tr>
      <th scope="row">${valor}</th>
      <td>${element.nombre}</td>
      <td>
        <i class="fas fa-minus"  data-id="${element.id}"></i> <label id="cant">${element.pedidoCant}</label> <i class="fas fa-plus"  data-id="${element.id}" id="sumarCant"></i>
      </td>
    </tr>
    `;
  });
  cleanDrud.innerHTML = template;
};
/*
plus.addEventListener("click", () => {
  console.log("hello");
  labelCant.textContent = "2";
});*/
cleanDrud.addEventListener("click", (e) => {
  btnAction(e);
});

let btnAction = (e) => {
  // console.log(e.target);
  if (
    e.target.classList.contains("fa-plus") &&
    drugObjet[e.target.dataset.id].pedidoCant <
      drugObjet[e.target.dataset.id].cantidad
  ) {
    // console.log(drugObjet[e.target.dataset.id]);
    const quantity = drugObjet[e.target.dataset.id];
    quantity.pedidoCant = drugObjet[e.target.dataset.id].pedidoCant + 1;
    drugObjet[e.target.dataset.id] = { ...quantity };
    pintarMedicamento();
  }

  if (e.target.classList.contains("fa-minus")) {
    const quantity = drugObjet[e.target.dataset.id];
    quantity.pedidoCant--;
    if (quantity.pedidoCant === 0) {
      delete drugObjet[e.target.dataset.id];
    }
    pintarMedicamento();
  }
  e.stopPropagation();
};

btnCleanDrug.addEventListener("click", () => {
  cleanDrud.innerHTML = "";
  drugObjet = {};
});

/* save info of attension*/
function validateEmpyFields() {
  if (document.getElementById("dni").value.length == 0) {
    swal("Por Favor!", "Ingrese datos del usuario", "info");
    return;
  }

  if (document.getElementById("diagnostico").value.length == 0) {
    swal("Por Favor!", "Redacte diagnostico ", "info");
    return;
  }
  if (document.getElementById("tratamiento").value.length == 0) {
    swal("Por Favor!", "Redacte tratamiento", "info");
    return;
  }
  if (Object.keys(drugObjet).length == 0) {
    swal("Por Favor!", "Agrege medicamentos", "info");
    return;
  }

  //return false;
}

let btnSaveInfoModel = document.getElementById("btnSaveaIn");
btnSaveInfoModel.addEventListener("click", () => {
  validateEmpyFields();

  /*let data = {
    dni: document.getElementById("dni").value,
    diagnostico: document.getElementById("diagnostico").value,
    tratamiento: document.getElementById("tratamiento").value,
    drug: Object.entries(drugObjet)[0][1].id,
    quantity: Object.entries(drugObjet)[0][1].pedidoCant,
  };*/

  //console.log(data);
  saveInfoAttention();
});

async function saveInfoAttention() {
  let data = new FormData();
  data.append("dni", document.getElementById("dni").value);
  data.append("diag", document.getElementById("diagnostico").value);
  data.append("trat", document.getElementById("tratamiento").value);
  data.append("drug", Object.entries(drugObjet)[0][1].id);
  data.append("quant", Object.entries(drugObjet)[0][1].pedidoCant);
  data.append("opc", "saveAttention");

  let response = await fetch("../Controller/attentionController.php", {
    method: "POST",
    body: data,
  });

  let dataresponse = await response.json();

  notification(dataresponse);
}

function notification(data) {
  console.log(data);
  if (data == 1) {
    swal("Genial", "Atencion Finalizada Correctamente", "success").then(() => {
      window.location.href = "inventario.php";
    });
  } else {
    swal("Noo", "No se Pudo Finalizar la Atencion", "error");
  }
}
