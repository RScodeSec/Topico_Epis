let dni = document.getElementById("find-dni");
let button = document.getElementById("searchUser");
//console.log(dni);
//card details
let cardDetails = document.querySelector(".showDetails");

button.addEventListener("click", (e) => {
  if (dni.value.length > 0) {
    console.log(dni.value);
    cardDetails.style.display = "block";
  }
  //console.log(dni.value);
});
