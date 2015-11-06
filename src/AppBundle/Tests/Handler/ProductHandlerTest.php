<?php
/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 05/11/15
 * Time: 21:30
 */

namespace AppBundle\Tests\Handler;


class ProductHandlerTest extends \PHPUnit_Framework_TestCase {

    protected $parser;
    protected $url;

    protected function setUp()
    {
        $this->url = 'http://www.sainsburys.co.uk/webapp/wcs/stores/servlet/CategoryDisplay?msg=&langId=44&categoryId=185749&storeId=10151&krypto=YSg6rjbQKJaCOU1MR6WeM71eIv0k1DGstlHKjiboEk5KtWpF0G0eyUldopnjm1dRIvaWYPN6qmcu%0Ax15B1fWNwTGdvwJJdZ2A2iRMMZWs8gXVN%2F2y1a%2F9a%2FBSHKYzXS5ioS8xmObHHaz3%2FkFNuM3vmyfG%0Am6BXnNrGyVI5amJ%2BYzwkqJZpo2T6lsnke42lTyUieuNQs8JilwLedRjgcNqvdd44EsAHqncYB87l%0Au%2BvshxRefArQX0SXWaPFcRRJZiG%2Bzngq%2FGnMAIr2O0UmSzs6U3Mih22rqoDqoMKimrU%2FSfE%3D#langId=44&storeId=10151&catalogId=10137&categoryId=185749&parent_category_rn=12518&top_category=12518&pageSize=20&orderBy=FAVOURITES_FIRST&searchTerm=&beginIndex=0&hideFilters=true';
    }

    public function testProductHandler()
    {

    }
}