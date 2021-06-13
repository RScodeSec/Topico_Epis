let printDataInfoIndex = document.getElementById("bodyInfoTopico");
document.addEventListener("DOMContentLoaded", () => {
  datadashboard();
});
async function datadashboard() {
  let response = await fetch("../Controller/userController.php?opc=infoIndex");
  let dataresponse = await response.json();
  printindex(dataresponse);
}
function printindex(data) {
  let template = "";
  data.forEach((e) => {
    template += `
    <div class="col-md-6 col-xl-4">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                <span class="text-c-blue f-w-600">Usuarios</span>
                <h4>${e.numUser}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Total
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                <span class="text-c-pink f-w-600">Stock</span>
                <h4>${e.numStock}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Medicamentos
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                <span class="text-c-green f-w-600">Atenciones</span>
                <h4>${e.numAttention}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Total
                    </span>
                </div>
            </div>
        </div>
    </div>
      `;
  });
  printDataInfoIndex.innerHTML = template;
}
