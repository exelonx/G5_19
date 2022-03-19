<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Pedidos_Proveedor.php");
    $pedidos_proveedor = new Pedidos_Proveedor();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GetPedidosProveedores":
            $datos=$pedidos_proveedor->get_Pedidos_Proveedores();
            echo json_encode($datos);
            break;

        case "GetPedidosProveedor":
            $datos=$pedidos_proveedor->get_Pedidos_Proveedor($body["ID"]);
            echo json_encode($datos);
            break;

        case "InsertPedidosProveedor":
            $datos=$pedidos_proveedor->insert_Pedidos_Proveedor($body["ID"],$body["ID_SOCIO"],$body["FECHA_PEDIDO"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"]);
            echo json_encode("Pedido de proveedor agregado");
            break;
        
        case "UpdatePedidosProveedor":
            $datos=$pedidos_proveedor->update_Pedidos_Proveedor($body["ID"],$body["ID_SOCIO"],$body["FECHA_PEDIDO"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"]);
            echo json_encode("Pedido de proveedor actualizado");
            break;

        case "DeletePedidosProveedor":
            $datos=$pedidos_proveedor->delete_Pedidos_Proveedor($body["ID"]);
            echo json_encode("Pedido de proveedor eliminado");
            break;        
    }
