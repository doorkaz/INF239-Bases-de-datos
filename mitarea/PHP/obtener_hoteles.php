<?php



function obtener_hoteles()
{
    include "db_conn.php";
    // Consulta sql de hoteles
    $sql = "SELECT * FROM hoteles";
    $result = mysqli_query($conn, $sql);

    // Guarda hoteles en un array
    $hoteles = array();

    // Verificar si se encontraron hoteles
    if ($result->num_rows > 0) {
        // Itera y guarda los datos de cada hotel en el array
        while ($fila = $result->fetch_assoc()) {
            $hotel = array(
                "id_hotel" => $fila["id_hotel"],
                "Nombre_hotel" => $fila["Nombre_hotel"],
                "Num_estrellas" => $fila["Num_estrellas"],
                "Precio_noche" => $fila["Precio_noche"],
                "Ciudad" => $fila["Ciudad"],
                "cant_total_hab" => $fila["cant_total_hab"],
                "estacionamiento" => $fila["estacionamiento"],
                "piscina" => $fila["piscina"],
                "serv_lavanderia" => $fila["serv_lavanderia"],
                "pet_friend" => $fila["pet_friend"],
                "serv_desayuno" => $fila["serv_desayuno"]
            );

            $hoteles[] = $hotel;
        }
    }
    
    return $hoteles;
}
?>