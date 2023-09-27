<?php
include 'getData.php';
session_start();
if (!isset($_SESSION["user_id"])) {
    
    header("Location: ../");
    exit();
} else {
    $user = getUser($_SESSION["user_id"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relaxis</title>
    <!-- URL PARA EXTRACION DE ICONOS-->
    <link rel='stylesheet' href='https:
    <link rel='stylesheet' href='https:
    <link rel='stylesheet'
        href='https:
    <link rel="stylesheet" href="../dist/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https:
    <link rel="stylesheet" href="profileStyle.css">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <aside id="sidebar" class="sidebar break-point-sm has-bg-image">
            <a id="btn-collapse" class="sidebar-collapser"><i class="ri-arrow-left-s-line"></i></a>
            <div class="image-wrapper">
                <!-- <img src="assets/images/sidebar-bg.jpg" alt="sidebar background" /> -->
            </div>
            <div class="sidebar-layout">
                <div class="sidebar-header">
                    <div class="pro-sidebar-logo">
                        <div>
                            <a href="#" onclick="nothingHere(); return false;">
                                R
                            </a>
                        </div>
                        <h5>Relaxis Song</h5>
                    </div>
                </div>
                <div class="sidebar-content">
                    <nav class="menu open-current-submenu">
                        <ul>
                            <li class="menu-header"><span> GENERAL </span></li>
                            <li class="menu-item">
                                <a href="#">
                                    <span class="menu-icon">
                                        <i class="ri-home-line"></i>
                                    </span>
                                    <span class="menu-title">Inicio</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="takeItChill.php">
                                    <span class="menu-icon">
                                        <i class="ri-music-line"></i>
                                    </span>
                                    <span class="menu-title">Lets take it chill</span>
                                    <span class="menu-suffix">
                                        <span class="badge primary">Hot</span>
                                    </span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="perfil.php">
                                    <span class="menu-icon">
                                        <i class="ri-account-circle-line"></i>
                                    </span>
                                    <span class="menu-title">Perfil</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="muro.php">
                                    <span class="menu-icon">
                                        <i class="ri-file-text-line"></i>
                                    </span>
                                    <span class="menu-title">Muro</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </aside>
        <div id="overlay" class="overlay"></div>
        <div class="layout">
            <main class="content">
                <div>
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>
                    <div id="perfil">
                        <section class="modify-profile">
                            <form action="userChange.php" method="POST">
                                <h1>Modificar nombre de usuario</h1>
                                <div class="form-container">
                                    <div class="form-block">
                                        <div class="form-item">
                                            <div>
                                                <label>Usuario actual: </label>
                                                <br />
                                                <label>Nuevo usuario: </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <?php
                                                    echo $user
                                                        ?>
                                                </label>
                                                <br />
                                                <input for="user" type="text" name="user" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-item">
                                        <div class="receive-newsletter">
                                            <input type="checkbox" name="confirmUser" required>
                                            <label>Confirmar cambio de usuario</label>
                                        </div>
                                    </div>
                                    <input class="btn-save" type="submit" value="Guardar cambios">
                                </div>
                            </form>
                        </section>

                        <section class="modify-profile">
                            <form action="src/userChange.php" method="POST">
                                <h1>Modificar Contraseña</h1>
                                <div class="form-container">
                                    <div class="form-block">
                                        <div class="form-item">
                                            <br />
                                            <div>
                                                <label for="realPassword">Contraseña Actual: </label>
                                                <br />
                                                <label for="firstname">Nueva Contraseña: </label>
                                            </div>
                                            <br>
                                            <div>
                                                <input for="realPassword" type="password" name="realPassword"
                                                    id="realPass" required>
                                                <br />
                                                <br />
                                                <input type="password" name="pass" id="pass" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-item">
                                        <div class="receive-newsletter">
                                            <input type="checkbox" name="pass" required>
                                            <label>Confirmar cambio de contraseña</label>
                                        </div>
                                    </div>
                                    <input class="btn-save" type="submit" value="Guardar cambios">
                                </div>
                            </form>
                        </section>


                        <h4>Cerrar Sesion:</h4>
                        <a href="../login/src/logout.php">
                            <p>Cerrar sesion</p>
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- partial -->
    <script src='https:
    <script src="https:
    <script src="../dist/script.js"></script>
    <script src="https:
</body>

</html>
<?php
require_once "../../login/src/conn.php";
$conn = conn();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['realPass'])) {
    $id = $_SESSION["user_id"];
    $password = $_POST['pass'];
    $mayRealPassword = $_POST['realPass'];
    
    if (confirmPass($id, $mayRealPassword)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET password= ? WHERE id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $hashedPassword, $id);

        if ($stmt->execute()) {
            echo "<script>alert('Contraseña editada correctamente.')</script>";
            echo "<meta http-equiv='refresh' content='0;url=../../login/src/logout.php'>";
        } else {
            echo "Error al actualizar la contraseña: " . $conn->error;
        }
        
    } else {
        echo "<script>alert('La contraseña que has introducido no es la contraseña actual del usuario.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=../perfil.php'>";
    }

} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user'])) {
    $id = $_SESSION["user_id"];
    $nuevoUsuario = $_POST['user'];

    $sql = "UPDATE user SET username = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nuevoUsuario, $id);
    if ($stmt->execute()) {
        echo "<script>alert('Usuario editado correctamente')</script>";
        echo "<meta http-equiv='refresh' content='0;url=../../login/src/logout.php'>";
    } else {
        echo "Error al actualizar el nombre de usuario: " . $conn->error;
    }
}

$conn->close();
?>