<?php
include 'db_conn.php'; 
$queryhotel = "";
$querypack = "";
if(ISSET($_GET['search'])){
    echo '<div class = "py-3 rounded">';
    echo '<div class="container">';

    //$filtered_get = array_filter($_GET); // removes empty values from $_GET

    if (!empty($_GET['hotel']) && empty($_GET['pack'])) { // not empty
        $queryhotel = "SELECT * FROM hoteles WHERE hab_disp >= 1 ";
        if(!empty($_GET['Nombre'])){
            $nombre= $_GET['Nombre'];
            $queryhotel .= "AND Nombre_hotel LIKE '%$nombre%' ";
        }
        if(!empty($_GET['ciudad'])){
            $ciudad = $_GET['ciudad'];
            $queryhotel .= "AND Ciudad LIKE '%$nombre%' ";
        }
        if (!empty($_GET['precio'])){
            $precio = $_GET['precio'];
            $queryhotel .= "AND Precio_noche <= $precio ";
        }
        if (!empty($_GET['rating'])){
            $precio = $_GET['precio'];
            $queryhotel .= "AND Precio_noche <= $precio ";
        }
        
    }
    else if (!empty($_GET['pack']) && empty($_GET['hotel'])){
        $querypack = "SELECT paquetes.*, h1.*, h2.*, h3.* FROM paquetes ";
        $querypack .= "JOIN hoteles AS h1 ON paquetes.hid1 = h1.id_hotel ";
        $querypack .= "JOIN hoteles AS h2 ON paquetes.hid2 = h2.id_hotel ";
        $querypack .= "JOIN hoteles AS h3 ON paquetes.hid3= h3.id_hotel "; 
        $querypack .= "WHERE cant_pack_disp >= 1 ";

        if(!empty($_GET['Nombre'])){
            $nombre= $_GET['Nombre'];
            $querypack .= "AND paquetes.Nombre_pack LIKE '%$nombre%' ";
        }
        if(!empty($_GET['ciudad'])){
            $ciudad= $_GET['ciudad'];
            $querypack .= "AND (h1.Ciudad LIKE '%$ciudad%' OR h2.Ciudad LIKE '%$ciudad%' OR h3.Ciudad LIKE '%$ciudad%') ";
        }
        
        if (!empty($_GET['precio'])){
            $precio = $_GET['precio'];
            $querypack .= " AND paquetes.Precio_persona <= $precio ";
        }
        if (!empty($_GET['rating'])){
            $rating = $_GET['rating'];
            $querypack .= " AND paquetes.Num_estrellas <= $rating ";
        }
        $fecha_salida = $_GET['fecha_salida'];
        $fecha_llegada = $_GET['fecha_llegada'];
        $querypack .= " AND paquetes.fecha_salida BETWEEN '$fecha_salida' AND ' $fecha_llegada' AND paquetes.fecha_llegada BETWEEN '$fecha_salida' AND ' $fecha_llegada'";
    }
    
    else {
        $querypack = "SELECT * FROM paquetes WHERE cant_pack_disp >= 1 ";
        $queryhotel = "SELECT * FROM hoteles WHERE hab_disp >= 1 ";
        if(!empty($_GET['Nombre'])){
            $nombre = $_GET['Nombre'];
            $querypack .= "AND Nombre_pack LIKE '%$nombre%' ";
            $queryhotel .= "AND Nombre_hotel LIKE '%$nombre%' ";
        }
        
        if (!empty($_GET['precio'])){
            $precio = $_GET['precio'];
            $querypack .= "AND Precio_persona <= $precio ";
            $queryhotel .= "AND Precio_noche <= $precio ";
            
        }
        if (!empty($_GET['rating'])){
            $calificacion = $_GET['rating'];
            $querypack .= "AND Num_estrellas >= $calificacion ";
            $queryhotel .= "AND Num_estrellas >= $calificacion ";
        }
        $fecha_salida = $_GET['fecha_salida'];
        $fecha_llegada = $_GET['fecha_llegada'];
        $querypack .= "AND fecha_salida BETWEEN '$fecha_salida' AND ' $fecha_llegada' AND fecha_llegada BETWEEN '$fecha_salida' AND ' $fecha_llegada' ";
       
    }
    $fecha_salida =  date_create($_GET['fecha_salida']);
    $fecha_llegada =  date_create($_GET['fecha_llegada']);
    $cant= $fecha_salida->diff($fecha_llegada)->format("%a");
    if ($querypack != ""){
        $result_paquete = mysqli_query($conn, $querypack);
    }
    if ($queryhotel != ""){
        $result_hotel = mysqli_query($conn, $queryhotel);
    }
   
    }

    // Guarda hoteles en un array
    $hoteles = array();
    
    // Verificar si se encontraron hoteles
    if ($queryhotel != "" && $result_hotel->num_rows > 0  ) {
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
    // Guarda paquetes en un array
    $paquetes = array();

    // Verificar si se encontraron paquetes
    if ($querypack != "" && $result_paquete->num_rows > 0 ) {
        // Itera y guarda los datos de cada hotel en el array
        while ($fila = $result_paquete->fetch_assoc()) {
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
    
    
    include "obtenerHotelesEnPaquete.php";
    // Divide los hoteles en grupos de 3
    $gruposHoteles = array_chunk($hoteles, 4);

    // Generar filas con tres hoteles cada una
    foreach ($gruposHoteles as $grupo) {
        echo '<div class="row mb-5" >';
        foreach ($grupo as $hotel) {
            echo '<div class="col-sm-6 col-md-3 col-lg-3">';
                echo '<div class="card shadow-sm" style="width: 18rem;">';
                    echo '<a href="detalles.php?product='. $hotel['id_hotel'].'&bool=0"><img class="card-img-top img-responsive" src="../images/hoteles/h-id' . $hotel["id_hotel"] . '-1.jpg" alt="imghotel"></a>';
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
                            echo '<form action="#"  method="POST">';
                                echo '<div class="d-grid mt-2">';
                                    
                                    echo '<input type="hidden"  value="'.$hotel['id_hotel'].'" name= "pid">'; 
                                    echo '<input type="hidden"  value="0" name= "bool">'; 
                                    echo '<input type="hidden"  value="'.$cant.'" name= "cant">'; 
                                    echo '<button type = "submit" name="cart" class="btn btn-reserve rounded">Agregar al carrito</button>';  
                                    echo '<button type="submit" name="wish" class="btn btn-cart rounded mt-1">Wishlist</button>';
                                    
                                echo '</div>';
                            echo '</form>';
                        echo '</div>';
                echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
    if (ISSET($_POST['wish'])){
        include 'wishlist.php';
    }
    if (ISSET($_POST['cart'])){
        include 'cart.php'; 
    } 

    
    // Divide los paquetes en grupos de 4
    $gruposPaquetes = array_chunk($paquetes, 3);

    // Generar filas con 4 paquetes cada una
    foreach ($gruposPaquetes as $grupo) {
        echo '<div class="row mb-5" >';
        foreach ($grupo as $paquete) {
            echo '<div class="col-sm-6 col-md-4 col-lg-4">';
                echo '<div class="card shadow-sm" style="width: 20rem; height: 100%">';
                    echo '<a href="detalles.php?product='. $paquete['id_pack'].'&bool=1"><img class="card-img-top img-responsive" src="../images/paquetes/p-id' . $paquete["id_pack"] . '-1.jpg" alt="imgpaquete"></a>';
                        echo '<div class="card-body">';
                            echo '<p class="fs-5">' . $paquete["Nombre_pack"] . '</p>';
                            echo '<p class="fs-6">CLP $'. number_format($paquete['precio_persona'], 0, ",", "."). '</p>';
                            echo '</br>';
                            echo '<div class="row">';
                                echo '<div class="col-6">';
                                echo '<h6>Aerolinea de Ida</h6>';
                                echo '<p>' . $paquete["aero_ida"]. '</p>';
                                echo '</div>';
                                echo '<div class="col-6">';
                                echo '<h6>Aerolinea de Vuelta</h6>';
                                echo '<p>' . $paquete["aero_vuelta"]. '</p>';
                                echo '</div>';
                            echo '</div>';
                            echo '</br>';
                            echo '<div class="row">';
                                echo '<div class="col-12">';
                                    echo '<h6> Hospedajes </h6>';
                                    $hoteles = obtenerHotelesEnPaquete($paquete["hid1"], $paquete["hid2"], $paquete["hid3"]);
                                    foreach($hoteles as $hotel){
                                        echo "<p>" . $hotel["Nombre_hotel"] . " - " . $hotel["Ciudad"] . "</p>";
                                    }
                                echo '</div>';
                            echo '</div>';
                            echo '</br>';
                            echo '<div class="row">';
                                echo '<div class="col-6">';
                                echo '<h6>Fecha de salida</h6>';
                                echo "<p>". date("d-m-Y", strtotime($paquete["fecha_salida"])) . "</p>";
                                echo '</div>';
                                echo '<div class="col-6">';
                                echo '<h6>Fecha de llegada</h6>';
                                echo "<p>".date("d-m-Y", strtotime($paquete["fecha_llegada"])). "</p>";
                                echo '</div>';
                            echo '</div>';
                            echo '</br>';
                            echo '<a href="detalles.php?product='. $paquete['id_pack'].'&bool=1" class="details-link">Ver más</a>';
                            echo '</br>';
                            for ($i = 1; $i <= $paquete['Num_estrellas']; $i++) {
                                echo '<i class="bi bi-star-fill me-1"></i>'; 
                            }
                            for ($i = $paquete['Num_estrellas'] + 1; $i <= 5; $i++) {
                                echo '<i class="bi bi-star me-1"></i>';
                            }
                            
                            echo '<form action="#"  method="POST">';
                                echo '<div class="d-grid mt-2">';
                                
                                    echo '<input type="hidden"  value="'.$paquete['id_pack'].'" name= "pid">'; 
                                    echo '<input type="hidden"  value="1" name= "bool">'; 
                                    echo '<input type="hidden"  value="1" name= "cant">'; 
                                    echo '<button type = "submit" name="cart" class="btn btn-reserve rounded">Agregar al carrito</button>';  
                                    echo '<button type="submit" name="wish" class="btn btn-cart rounded mt-1">Wishlist</button>';
                                    
                                    
                                echo '</div>';
                            echo '</form>';
                        echo '</div>';
                echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
    if (ISSET($_POST['wish'])){
        include 'wishlist.php'; 
    }
    if (ISSET($_POST['cart'])){
        include 'cart.php'; 
    } 
    

?>
