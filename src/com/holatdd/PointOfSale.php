<?php
/**
 *
 * @author Isidro Merayo
 */
namespace com\holatdd;

class PointOfSale {
    
    private $catalog;
    
    public function __construct(Catalog $catalog) {
        $this->catalog = $catalog;
    }
    
    public function onBarcode($barcode) {
        $this->catalog->search($barcode);
    }
}
