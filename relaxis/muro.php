<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: ../");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relaxis</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'>
    <link rel="stylesheet" href="dist/style.css">
    <link rel="stylesheet" href="src/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <aside id="sidebar" class="sidebar break-point-sm has-bg-image collapsed">
            <a id="btn-collapse" class="sidebar-collapser"><i class="ri-arrow-left-s-line"></i></a>
            <div class="image-wrapper">
            </div>
            <div class="sidebar-layout">
                <div class="sidebar-header">
                    <div class="pro-sidebar-logo">
                        <div>
                            <a href="#" onclick="nothingHere(); return false;">
								<img src="img/logo/lgblack.png" alt="logo" id="imgLogo"></img>
                            
                            </a>
                        </div>
                        <h5>&ensp;Relaxis Song</h5>
                    </div>
                </div>
                <div class="sidebar-content">
                    <nav class="menu open-current-submenu">
                        <ul>
                            <li class="menu-header"><span> GENERAL </span></li>
                            <li class="menu-item">
                                <a href="index.php">
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
                                <a href="#">
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
                    <div class="container mt-5">
                        <h1>Comentarios Anónimos</h1>
                        <div class="mb-3">
                            <label for="comment">Deja tu comentario:</label>
                            <textarea class="form-control" id="comment" rows="3" required></textarea>
                        </div>
                        <button class="btn btn-primary" id="submitComment" style="float: right;">Enviar Comentario</button>
                        <br/>
                        <div class="mt-3" id="commentsList">
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="dist/script.js"></script>
    <script src="src/normalCode.js"></script>
    <script src="src/comms/comments.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>