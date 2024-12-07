<?php
// Conectar a la base de datos
$host = 'localhost';
$dbname = 'videojuegos_db';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Función para eliminar un juego
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("UPDATE juegos SET visible = 0 WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: admin.php");
}

// Función para agregar un juego
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $nombre = $_POST['nombre'];
    $imagen = $_POST['imagen'];
    $plataforma = $_POST['plataforma'];
    $categoria = $_POST['categoria'];
    $jugadores = $_POST['jugadores'];

    $stmt = $pdo->prepare("INSERT INTO juegos (nombre, imagen, plataforma, categoria, jugadores) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nombre, $imagen, $plataforma, $categoria, $jugadores]);

    header("Location: admin.php");
}

// Obtener todos los juegos
$stmt = $pdo->prepare("SELECT * FROM juegos");
$stmt->execute();
$juegos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Juegos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Administrar Juegos</h1>
    <nav>
        <a href="index.php">Catálogo</a>
        <a href="admin.php">Administrar</a>
    </nav>
</header>

<main>
    <section>
        <h2>Agregar Juego</h2>
        <form action="admin.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="imagen" placeholder="URL de Imagen" required>
            <select name="plataforma">
                <option value="PS3">PS3</option>
                <option value="PS4">PS4</option>
                <option value="Switch">Switch</option>
            </select>
            <select name="categoria">
                <option value="Acción">Acción</option>
                <option value="Aventura">Aventura</option>
                <option value="RPG">RPG</option>
            </select>
            <select name="jugadores">
                <option value="1">1 Jugador</option>
                <option value="2">2 Jugadores</option>
            </select>
            <button type="submit" name="add">Agregar Juego</button>
        </form>
    </section>

    <section>
        <h2>Juegos</h2>
        <div class="juegos">
            <?php foreach ($juegos as $juego): ?>
                <div class="juego">
                    <h3><?= $juego['nombre'] ?></h3>
                    <a href="?delete=<?= $juego['id'] ?>">Eliminar</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

</body>
</html>
