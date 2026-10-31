
<?php
$resultado = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $numero1 = $_POST["numero1"] ?? "";
    $numero2 = $_POST["numero2"] ?? "";
    $operacion = $_POST["operacion"] ?? "";

    if (is_numeric($numero1) && is_numeric($numero2)) {
        $a = (float) $numero1;
        $b = (float) $numero2;

        switch ($operacion) {
            case "sumar":
                $resultado = $a + $b;
                break;
            case "restar":
                $resultado = $a - $b;
                break;
            case "multiplicar":
                $resultado = $a * $b;
                break;
            case "dividir":
                if ($b != 0) {
                    $resultado = $a / $b;
                } else {
                    $error = "No se puede dividir para cero.";
                }
                break;
            default:
                $error = "Selecciona una operación válida.";
        }
    } else {
        $error = "Ingresa dos números válidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi página personal</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<header>
    <h1>¡Hola! Soy Ivan Mesias Bautista Andrade</h1>
    <p>Bienvenido a mi página web personal</p>
</header>

<nav>
    <a href="#sobre-mi">Sobre mí</a>
    <a href="#habilidades">Habilidades</a>
    <a href="#calculadora">Calculadora</a>
    <a href="#contacto">Contacto</a>
</nav>

<main>
    <section id="sobre-mi">
        <h2>Sobre mí</h2>
        <p>
            Mi nombre es Ivan Mesias Bautista Andrade. Soy estudiante y me interesa
            la tecnología, la programación y el desarrollo web.
        </p>
    </section>

    <section id="habilidades">
        <h2>Mis habilidades</h2>
        <ul>
            <li>Trabajo en equipo</li>
            <li>Responsabilidad</li>
            <li>Aprendizaje de HTML, CSS y PHP</li>
        </ul>
    </section>

    <section id="calculadora">
        <h2>Mi calculadora en PHP</h2>

        <form method="POST" action="#calculadora">
            <label for="numero1">Primer número:</label>
            <input type="number" step="any" id="numero1"
                   name="numero1" required>

            <label for="numero2">Segundo número:</label>
            <input type="number" step="any" id="numero2"
                   name="numero2" required>

            <label for="operacion">Operación:</label>
            <select id="operacion" name="operacion">
                <option value="sumar">Suma (+)</option>
                <option value="restar">Resta (-)</option>
                <option value="multiplicar">Multiplicación (*)</option>
                <option value="dividir">División (/)</option>
            </select>

            <button type="submit">Calcular</button>
        </form>

        <?php if ($error !== ""): ?>
            <p class="error">
                <?= htmlspecialchars($error) ?>
            </p>
        <?php elseif ($resultado !== ""): ?>
            <p class="resultado">
                Resultado: <?= htmlspecialchars((string) $resultado) ?>
            </p>
        <?php endif; ?>
    </section>

    <section id="contacto">
        <h2>Contacto</h2>
        <p>Correo: ivanba86@uniandes.edu.ec</p>
    </section>
</main>

<footer>
    <p>© 2026 - Mi página personal</p>
</footer>

</body>
</html>



