<?php

/**
 *
 * @author Isidro Merayo
 */
use com\holatdd\PointOfSale as PointOfSale;
use \Mockery as m;

class PointOfSaleTest extends PHPUnit_Framework_TestCase {
    
    
    public function tearDown() {
        m::close();
    }
    
    /**
     * @test
     */
    public function onBarcode_search_catalog() {
        $catalog = m::mock('Catalog');
        
        $pointOfSale = new PointOfSale();
        $pointOfSale->onBarcode('123');
        
        $catalog->shouldReceive('search')->with('123')->once();
        // verify(catalog).search("123");
    }
}
