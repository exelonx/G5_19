<?php
    class Pedidos_Proveedor extends Conectar{
        public function get_pedidos_proveedores(){
            $conectar=parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_pedidos_proveedor";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_Pedidos_Proveedor($id){
            $conectar=parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_pedidos_proveedor WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_Pedidos_Proveedor($id, $idSocio, $fechaPedido, $detalle, $subTotal, $totalISV, $total, $fechaEntrega, $estado){
            $conectar=parent::Conexion();
            parent::set_names();
            $sql="INSERT INTO ma_pedidos_proveedor VALUES(?,?,?,?,?,?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->bindValue(2, $idSocio);
            $sql->bindValue(3, $fechaPedido);
            $sql->bindValue(4, $detalle);
            $sql->bindValue(5, $subTotal);
            $sql->bindValue(6, $totalISV);
            $sql->bindValue(7, $total);
            $sql->bindValue(8, $fechaEntrega);
            $sql->bindValue(9, $estado);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_Pedidos_Proveedor($id, $idSocio, $fechaPedido, $detalle, $subTotal, $totalISV, $total, $fechaEntrega, $estado){
            $conectar=parent::Conexion();
            parent::set_names();
            $sql="UPDATE ma_pedidos_proveedor SET ID_SOCIO = ?, FECHA_PEDIDO = ?, DETALLE = ?, SUB_TOTAL = ?, TOTAL_ISV = ?, TOTAL = ?, FECHA_ENTREGA = ?, ESTADO = ? WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idSocio);
            $sql->bindValue(2, $fechaPedido);
            $sql->bindValue(3, $detalle);
            $sql->bindValue(4, $subTotal);
            $sql->bindValue(5, $totalISV);
            $sql->bindValue(6, $total);
            $sql->bindValue(7, $fechaEntrega);
            $sql->bindValue(8, $estado);
            $sql->bindValue(9, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_Pedidos_proveedor($id){
            $conectar=parent::Conexion();
            parent::set_names();
            $sql="DELETE FROM ma_pedidos_proveedor WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>