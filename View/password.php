<?php
include_once "../Controller/session.php";
$session = new Session();

if (empty($_SESSION['nombres'])) {

    $session->redirect();
}
include_once "./layout/header.php";
?>
<div class="card">
    <div class="card-body">
        <h4>Actualizar Credenciales</h4>
        <!--<?php //echo $_SESSION['nombres']; 
            ?>-->
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form id="formUpdatePassword">
            <div class="form-group">
                <label for="oldpassword">Contraseña Anterior</label>
                <input type="password" class="form-control" id="oldpassword" name="oldpassword" aria-describedby="emailHelp" placeholder="Ingresar Nueva Contraseña" required>

            </div>
            <div class="form-group">
                <label for="newpassword">Nueva Contraseña</label>
                <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder=" Nueva Password" required>
            </div>

            <button type="submit" class="btn btn-warning">Actualizar Contraseña</button>
        </form>
    </div>
</div>


<?php
include_once "./layout/foother.php";
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="./js/updatePassword.js"></script>


</body>

</html>