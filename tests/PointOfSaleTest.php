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
        $screen = m::mock('\com\holatdd\Screen');
        $catalog = m::mock('\com\holatdd\Catalog');
        
        $catalog->shouldReceive('search')->with('123')->once();
        $screen->shouldReceive('show');
        
        $pointOfSale = new PointOfSale($catalog, $screen);
        $pointOfSale->onBarcode('123');
        
    }
    
    /**
     * @test
     */
    public function onBarcode_show_price() {
        $screen = m::mock('\com\holatdd\Screen');
        $catalog = m::mock('\com\holatdd\Catalog');
                
        
        $screen->shouldReceive('show')->once();
        $catalog->shouldReceive('search')->with('123')->andReturn('1€');
        
        $pointOfSale = new PointOfSale($catalog, $screen);
        $price = $pointOfSale->onBarcode('123');
        
    }
}
