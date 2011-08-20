<?php

/**
 *
 * @author Isidro Merayo
 */
use com\holatdd\PointOfSale as PointOfSale;

use \Mockery as m;

class PointOfSaleTest extends PHPUnit_Framework_TestCase {
    
    private $screen;
    private $catalog;
    private $pointOfSale;
    
    public function setUp() {
        $this->screen = m::mock('\com\holatdd\Screen');
        $this->catalog = m::mock('\com\holatdd\Catalog');
        $this->pointOfSale = new PointOfSale($this->catalog, $this->screen);
    }
    
    public function tearDown() {
        m::close();
    }
    
    /**
     * @test
     */
    public function onBarcode_search_catalog() {
        
        $this->catalog->shouldReceive('search')->with('123')->once();
        $this->screen->shouldReceive('show');
        
        $this->pointOfSale->onBarcode('123');
        
    }
    
    /**
     * @test
     */
    public function onBarcode_show_price() {
        
        $this->screen->shouldReceive('show')->once();
        $this->catalog->shouldReceive('search')->with('123')->andReturn('1€');
        
        $this->pointOfSale->onBarcode('123');
        
    }
}
