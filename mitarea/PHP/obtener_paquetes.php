<?php

function obtener_paquetes()
{
    include "db_conn.php";
    // Consulta sql de paquetes
    $sql = "SELECT * FROM paquetes WHERE cant_pack_disp >= 1";
    $result = mysqli_query($conn, $sql);

    // Guarda paquetes en un array
    $paquetes = array();
    
    // Verificar si se encontraron paquetes
    if ($result->num_rows > 0) {
        // Itera y guarda los datos de cada hotel en el array
        while ($fila = $result->fetch_assoc()) {
            $paquete = array(
                "id_pack" => $fila["id_pack"],
                "hid1" => $fila["hid1"],
                "hid2" => $fila["hid2"],
                "hid3" => $fila["hid3"],
                "Nombre_pack" => $fila["Nombre_pack"],
                "aero_ida" => $fila["aero_ida"],
                "aero_vuelta" => $fila["aero_vuelta"],
                "fecha_salida" => $fila["fecha_salida"],
                "fecha_llegada" => $fila["fecha_llegada"],
                "total_noches" => $fila["total_noches"],
                "precio_persona" => $fila["precio_persona"],
                "cant_pack_disp" => $fila["cant_pack_disp"],
                "total_packs" => $fila["total_packs"],
                "total_person_pack" => $fila["cant_pack_disp"],
                "Num_estrellas" => $fila["Num_estrellas"]
            );

            $paquetes[] = $paquete;
        }
    }
    
    return $paquetes;
}

?>