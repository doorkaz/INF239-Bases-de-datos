<?php
include 'db_conn.php'; 

if(ISSET($_GET['search'])){
    echo '<div class = "py-3 rounded">';
    echo '<div class="container">';

    //$filtered_get = array_filter($_GET); // removes empty values from $_GET

    if (ISSET($_GET['hotel'])) { // not empty
        $query = "SELECT * FROM hoteles WHERE hab_disp >= 1 AND ";
        if(!empty($_GET['Nombre']) && empty($_GET['ciudad'])){
            $nombre= $_GET['Nombre'];
            $query .= "Nombre_hotel LIKE '%$nombre%'";
        }
        else if(!empty($_GET['ciudad']) && empty($_GET['Nombre'])){
            $ciudad= $_GET['ciudad'];
            $query .= "Ciudad LIKE '%$ciudad%'";
        }
        else if (!empty($_GET['ciudad']) && !empty($_GET['Nombre'])){
            $nombre= $_GET['Nombre'];
            $ciudad= $_GET['ciudad'];
            $query .= "Ciudad LIKE '%$ciudad%' AND Nombre_hotel LIKE '%$nombre%'";
        }
        else{
            $query = "SELECT * FROM hoteles WHERE hab_disp >= 1";
        }
        
    }
    else if (ISSET($_GET['paquete'])){
        $query = "SELECT * FROM paquetes WHERE cant_pack_disp >= 1";
    }
    else{
        $query = "SELECT * FROM hoteles WHERE hab_disp >= 1";
    }
    echo $query;
    $query .= ";";
    $result_hotel = mysqli_query($conn, $query);
    // Guarda hoteles en un array
    $hoteles = array();

    // Verificar si se encontraron hoteles
    if ($result_hotel->num_rows > 0) {
        // Itera y guarda los datos de cada hotel en el array
        while ($fila = $result_hotel->fetch_assoc()) {
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
                            echo '<a class="details-link" role="button" onclick="mostrarDetallesHotel('. $hotel["id_hotel"] .')">Mostrar detalles</a>';
                            echo '<div id="details-'.$hotel["id_hotel"].'" style="display: none"></div>';
                            
                            echo '</br>';
                            for ($i = 1; $i <= $hotel["Num_estrellas"]; $i++) {
                                echo '<i class="bi bi-star-fill me-1"></i>'; 
                            }
                            for ($i = $hotel["Num_estrellas"] + 1; $i <= 5; $i++) {
                                echo '<i class="bi bi-star me-1"></i>';
                            }
                            
                            echo '<form action=""  method="POST">';
                                echo '<div class="d-grid mt-2">';
                                    
                                    echo '<input type="hidden"  value="'.$hotel['id_hotel'].'" name= "pid">'; 
                                    echo '<input type="hidden"  value="0" name= "bool">'; 
                                    echo '<button type = "submit" class="btn btn-reserve rounded">Reservar</button>';  
                                    echo '<button type="submit" name="wish" class="btn btn-cart rounded mt-1">Agregar al carrito</button>';
                                    
                                echo '</div>';
                            echo '</form>';
                        echo '</div>';
                echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
<<<<<<< Updated upstream
    if (ISSET($_POST['wish'])){
        include 'wishfunction.php';
    }
            
=======

>>>>>>> Stashed changes
    echo '</div>';
    echo '</div>';
}

?>
