<?php
// Conectar a la base de datos
$host = 'localhost';
$dbname = 'videojuegos_db';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Obtener filtros
$plataforma = isset($_GET['plataforma']) ? $_GET['plataforma'] : '';
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$jugadores = isset($_GET['jugadores']) ? $_GET['jugadores'] : '';

// Consulta de juegos con filtros
$query = "SELECT * FROM juegos WHERE visible = 1";
if ($plataforma) {
    $query .= " AND plataforma = :plataforma";
}
if ($categoria) {
    $query .= " AND categoria = :categoria";
}
if ($jugadores) {
    $query .= " AND jugadores = :jugadores";
}
$stmt = $pdo->prepare($query);

// Bind parameters
if ($plataforma) $stmt->bindParam(':plataforma', $plataforma);
if ($categoria) $stmt->bindParam(':categoria', $categoria);
if ($jugadores) $stmt->bindParam(':jugadores', $jugadores);

// Ejecutar consulta
$stmt->execute();
$juegos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Catálogo de Juegos</title>
    <link rel="stylesheet" href="style.css">
    <!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>

<header>
    <h1>Catálogo de Videojuegos</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="admin.php">Administrar</a>
    </nav>
</header>

<main>
    <section id="filtros">
        <form action="index.php" method="GET">
            <select name="plataforma">
                <option value="">Plataforma</option>
                <option value="PS3">PS3</option>
                <option value="PS4">PS4</option>
                <option value="Switch">Switch</option>
            </select>
            <select name="categoria">
                <option value="">Categoría</option>
                <option value="Acción">Acción</option>
                <option value="Aventura">Aventura</option>
                <option value="RPG">RPG</option>
            </select>
            <select name="jugadores">
                <option value="">Jugadores</option>
                <option value="1">1 Jugador</option>
                <option value="2">2 Jugadores</option>
            </select>
            <button type="submit">Filtrar</button>
        </form>
    </section>

    <section id="catalogo">
        <h2>Juegos</h2>
        <div class="juegos">
            <?php foreach ($juegos as $juego): ?>
                <div class="juego">
                    <img src="<?= $juego['imagen'] ?>" alt="<?= $juego['nombre'] ?>">
                    <h3><?= $juego['nombre'] ?></h3>
                    <p>Jugadores: 
        <?php
        if ($juego['jugadores'] == '1') {
            echo '<i class="fas fa-user"></i>';  // Icono de una persona
        } elseif ($juego['jugadores'] == '2') {
            echo '<i class="fas fa-users"></i>'; // Icono de dos personas
        }
        ?>
    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2024 XGamersPerú</p>
</footer>

</body>
</html>
