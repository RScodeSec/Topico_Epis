let btnlogin = document.getElementById('btn-login');



btnlogin.addEventListener('click',(event)=>{
    event.preventDefault()
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;
    login(username, password);
    

});

async function login(username, password){
    let data = new FormData();
    data.append('username', username);
    data.append('password', password);
    data.append('opc', 'login');
    
    let response = await fetch('./Controller/loginController.php',{
        method: 'POST',
        body: data
    });
    
    let dataresponse = await response.json();
    notification(dataresponse);

}

function notification(dataresponse){
    if(dataresponse == 0){
        swal("Error", "Usuario/Contraseña Incorrecto", "error");
    }
    else{
        window.location.href = "view/index.php";

    }

}