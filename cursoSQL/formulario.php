<?php

    if($_POST){
        $nombre = $_POST['nombre'];
        $primerapellido = $_POST['primerapellido'];
        $segundoapellido = $_POST['segundoapellido'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!preg_match('/^[A-Za-z]+$/', $nombre)) {
          echo "<script>javascript:history.back(alert('El nombre solo puede contener letras y números.'));</script>;";
        } elseif (!preg_match('/^[A-Za-z0-9]+$/', $primerapellido)) {
          echo "<script>javascript:history.back(alert('El primer apellido solo puede contener letras y números.'));</script>;";
        } elseif (!preg_match('/^[A-Za-z0-9]+$/', $segundoapellido)) {
          echo "<script>javascript:history.back(alert('El segundo apellido solo puede contener letras y números.'));</script>;";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo "<script>javascript:history.back(alert('El email no es valido.'));</script>;";
        } elseif (strlen($password) < 4 or strlen($password) > 8) {
          echo "<script>javascript:history.back(alert('La contraseña debe tener entre 4 y 8 carácteres.'));</script>;";
        } else {
          $servername = "localhost";
          $username = "root";
          $dbname = "cursosql";
          $conn= new mysqli($servername, $username, '', $dbname);
  
          if ($conn->connect_error){
              die("Connection failed: " . $conn -> connect_error);
          }
          
          $select = "SELECT * FROM usuario WHERE email='$email'";
          $result = $conn->query($select);
          if ($result->num_rows > 0) {
            echo "<script>javascript:history.back(alert('El email ya existe.'));</script>;";
          } else {
            $insert = "INSERT INTO usuario(nombre, primerapellido, segundoapellido, email, password)
            VALUES ('$nombre', '$primerapellido', '$segundoapellido', '$email', '$password')";
    
            if ($conn->query($insert) == TRUE){
                echo "<h1>Se ha creado el registro satisfactoriamente</h1>";
                echo "<div>Nombre: $nombre</div>";
                echo "<div>Correo electronico: $email</div>";
                echo "<button onclick=\"location.href='consulta.php'\">Consultar usuarios</button>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }
          $conn->close();
        }
    }  
?>