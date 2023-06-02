<?php
include 'db_conn.php'; 
echo '<div class = "py-3 rounded">';
echo '<div class="container">';
if(ISSET($_GET['search'])){
    $query = "SELECT * FROM hoteles";

    $filtered_get = array_filter($_GET); // removes empty values from $_GET

    if (count($filtered_get)) { // not empty
        $query .= " WHERE";

        $keynames = array_keys($filtered_get); // make array of key names from $filtered_get
        
        foreach($filtered_get as $key => $value)
        {
        $query .= " $key LIKE '$value'";  // $filtered_get keyname = $filtered_get['keyname'] value
        if ((count($filtered_get)-1 > $key)) { // more than one search filter, and not the last
            $query .= " OR";
        }
        }
    }
    $query .= ";";
    $result = mysqli_query($conn, $query);

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

    // Divide los hoteles en grupos de 3
    $gruposHoteles = array_chunk($hoteles, 4);

    // Generar filas con tres hoteles cada una
    foreach ($gruposHoteles as $grupo) {
        echo '<div class="row mb-5" >';
        foreach ($grupo as $hotel) {
            echo '<div class="col-sm-6 col-md-3 col-lg-3">';
                echo '<div class="card shadow-sm" style="width: 18rem;">';
                    echo '<img class="card-img-top img-responsive" src="../images/hoteles/h-id' . $hotel["id_hotel"] . '-1.jpg" alt="imghotel">';
                        echo '<div class="card-body">';
                            echo '<p class="fs-5">' . $hotel["Nombre_hotel"] . '</p>';
                            echo '<p class="fs-6">CLP $'. number_format($hotel['Precio_noche'], 0, ",", "."). '</p>';
                            echo '</br>';
                            if (isset($_GET['hotel']) && $_GET['hotel'] === $hotel["id_hotel"]){
                                echo '<a href="hoteles.php" class="details-link">Mostrar detalles</a>';
                                if ($hotel["estacionamiento"] == 1){
                                    echo '<p><i class="fa-solid fa-car"></i> Estacionamiento';
                                    echo '<i class="bi bi-check"></i>';
                                } else{
                                    echo '<p><i class="fa-solid fa-car"></i> Estacionamiento';
                                    echo '<i class="bi bi-x"></i>';
                                }
                                echo '</p>';

                                
                                if ($hotel["piscina"] == 1){
                                    echo '<p><i class="fa-solid fa-person-swimming"></i> Piscina';
                                    echo '<i class="bi bi-check"></i>';
                                } else{
                                    echo '<p><i class="fa-solid fa-person-swimming"></i> Piscina';
                                    echo '<i class="bi bi-x"></i>';
                                }
                                echo '</p>';

                                
                                if ($hotel["serv_lavanderia"]==1){
                                    echo '<p><img src="../images/washing.png" width="16" height="14"> Servicio de lavanderia';
                                    echo '<i class="bi bi-check"></i>';
                                } else{
                                    echo '<p><img src="../images/washing.png" width="16" height="14"> Servicio de lavanderia';
                                    echo '<i class="bi bi-x"></i>';
                                }
                                echo '</p>';
                                
                                if ($hotel["pet_friend"]){
                                    echo '<p><img src="../images/paw.png" width="16" height="14"> Pet Friendly';
                                    echo '<i class="bi bi-check"></i>';
                                } else{
                                    echo '<p><img src="../images/paw.png" width="16" height="14"> Pet Friendly';
                                    echo '<i class="bi bi-x"></i>';
                                }
                                echo '</p>';

                            
                                if ($hotel["serv_desayuno"]){
                                    echo '<p><i class="fa-solid fa-utensils"></i> Servicio de desayuno';
                                    echo '<i class="bi bi-check"></i>';
                                } else{
                                    echo '<p><i class="fa-solid fa-utensils"></i> Servicio de desayuno';
                                    echo '<i class="bi bi-x"></i>';
                                }
                                echo '</p>';
                            } else {
                                echo '<a href="?hotel='.$hotel["id_hotel"].'" class="details-link">Mostrar detalles</a>';
                            }
                            echo '</br>';
                            for ($i = 1; $i <= $hotel["Num_estrellas"]; $i++) {
                                echo '<i class="bi bi-star-fill me-1"></i>'; 
                            }
                            for ($i = $hotel["Num_estrellas"] + 1; $i <= 5; $i++) {
                                echo '<i class="bi bi-star me-1"></i>';
                            }
                            
                            
                            echo '<div class="d-grid mt-2">';
                                echo '<button type="button" class="btn btn-reserve rounded">Reservar</button>';
                                echo '<button type="button" class="btn btn-cart rounded mt-1">Agregar al carrito</button>';
                            echo '</div>';
                        echo '</div>';
                echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}
?>
