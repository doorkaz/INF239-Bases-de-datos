<?php
include "db_conn.php";

$id_hotel = $_POST['id'];

$sql = "SELECT * FROM hoteles WHERE id_hotel=$id_hotel";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

$hotel = array(
    "id_hotel" => $row["id_hotel"],
    "Nombre_hotel" => $row["Nombre_hotel"],
    "Num_estrellas" => $row["Num_estrellas"],
    "Precio_noche" => $row["Precio_noche"],
    "Ciudad" => $row["Ciudad"],
    "cant_total_hab" => $row["cant_total_hab"],
    "estacionamiento" => $row["estacionamiento"],
    "piscina" => $row["piscina"],
    "serv_lavanderia" => $row["serv_lavanderia"],
    "pet_friend" => $row["pet_friend"],
    "serv_desayuno" => $row["serv_desayuno"]
);

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

?>