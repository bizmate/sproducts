<?php
/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 05/11/15
 * Time: 23:55
 */

namespace AppBundle\Parser;

use Symfony\Component\DomCrawler as DomCrawler;
use GuzzleHttp\Client as GuzzleClient;


class ProductParser {

    const PRODUCT_XPATH = '//div[contains(concat(" ", normalize-space(@class), " "), " product ")]';

    /**
     * @var @DomCrawler\Crawler
     */
    private $crawler;

    /**
     * @var GuzzleClient
     */
    private $httpClient;

    private $pageFetcher;

    function __construct( )
    {
        //$this->crawler = $crawler;
        //$this->httpClient = $httpClient;

        $this->pageFetcher = new PageFetcher();
    }

    public function getProducts($url)
    {
        $productsPageHTML = $this->pageFetcher->fetchHtml($url);
        $incompleteTmpProducts = $this->getFirstPageAttributes($productsPageHTML);

        return $this->addSizeDescriptionToProducts($incompleteTmpProducts);
    }

    private function addSizeDescriptionToProducts($incompleteTmpProducts)
    {
        for($i =0; $i < count($incompleteTmpProducts); $i++ )
        {
            $descriptionHtmlSize = $this->pageFetcher->fetchHtmlAndSize($incompleteTmpProducts[$i]['link']);
            $incompleteTmpProducts[$i]['description'] = $this->getProductDescription($descriptionHtmlSize['html']);
            $incompleteTmpProducts[$i]['size'] = $descriptionHtmlSize['size'];
        }

        return $incompleteTmpProducts;
    }

    private function getProductDescription($html)
    {
        /*
         * This xpath is not enough, some descriptions will not be populated as part of this exercise
         * Due to the dom being different in some pages
         */
        $descXpath = '//div[contains(concat(" ", normalize-space(@class), " "), " productText ")]/p';

        $crawler = new DomCrawler\Crawler($html);
        $description = 'No description found';
        try{
            $description = $crawler->filterXpath($descXpath)->first()->text();
        }
        catch(\Exception $e){

        }
        return $description;
    }

    private function getFirstPageAttributes($html)
    {
        $crawler = new DomCrawler\Crawler($html);

        $nodeValues = $crawler->filterXpath(self::PRODUCT_XPATH)->each(function (DomCrawler\Crawler $node, $i) {

            $descXpath = '//div[contains(concat(" ", normalize-space(@class), " "), " productInfo ")]/h3/a';
            $priceXpath = '//p[contains(concat(" ", normalize-space(@class), " "), " pricePerUnit ")]';
            $priceRegEx='/([0-9]+[.|,][0-9])|([0-9][.|,][0-9]+)|([0-9]+)/i';

            $thisLink = $node->filterXPath($descXpath)->first();
            $thisPriceText = trim($node->filterXPath($priceXpath)->first()->text());
            preg_match( $priceRegEx , $thisPriceText , $priceMatch);


            return array(
                'title' => trim($thisLink->text()),
                'link' => $thisLink->attr('href') ,
                'price' => $priceMatch[0] //too risky but again no time
            ) ;

        });
        return $nodeValues;
    }

}