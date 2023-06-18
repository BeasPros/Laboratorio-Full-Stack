<html>
<head>
    <meta charset="utf-8">
    <title>Consulta de usuarios</title>
</head>
<body>
<?php
    $servername = "localhost";
    $username = "root";
    $dbname = "cursosql";    
    $conn= new mysqli($servername, $username, '', $dbname);

    if ($conn->connect_error){
        die("Connection failed: " . $conn -> connect_error);
    }
    
    $sql = "SELECT * FROM usuario";
    $results = $conn->query($sql);
    $usuarios = [];
    if($results->num_rows > 0){
        while($row = $results->fetch_object()){
            $usuarios[] = $row;
        }
    }
    echo "<div>
            <h1>Se ha creado el registro satisfactoriamente</h1>
            </div>";
    echo "<div><h2>Usuarios</h2>";
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Email</th>
            </tr>";

    foreach ($usuarios as $usuario) {
        echo "<tr>
                <td>$usuario->ID</td>
                <td>$usuario->Nombre</td>
                <td>$usuario->PrimerApellido</td>
                <td>$usuario->SegundoApellido</td>
                <td>$usuario->Email</td>
            </tr>";
    }
    echo "</table></div>";
    $conn->close();
?>
</body>
</html>

