<?php

function confirmOrder() {
    $db = DB::get();
    
    try {
        $db->startTransaction();

        $db->execute("UPDATE orders SET status = :status WHERE id = :id", [":status" => "confirmed", ":id" => $this->getId()]);
        
        foreach ($this->getProducts() as $product) {
            $db->execute("UPDATE products SET stock = stock - :quantity WHERE id = :id", [":quantity" => $product->getQuantity(), ":id" => $product->getId()]);
        }
        
        $db->commit();
    }
    catch (\Exception $e) {
        $db->rollback();
        throw $e;
    }
}

function cancelOrder() {
    $db = DB::get();

    try {
        $db->startTransaction();

        $db->execute("UPDATE orders SET status = :status WHERE id = :id", [":status" => "cancelled", ":id" => $this->getId()]);

        foreach ($this->getProducts() as $product) {
            $db->execute("UPDATE products SET stock = stock + :quantity WHERE id = :id", [":quantity" => $product->getQuantity(), ":id" => $product->getId()]);
        }

        $db->commit();
    }
    catch (\Exception $e) {
        $db->rollback();
        throw $e;
    }
}

?>
