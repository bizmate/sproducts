<?php
/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 05/11/15
 * Time: 22:12
 */

namespace AppBundle\Tests\Parser;

use AppBundle\Parser\ProductParser;
use Symfony\Component\DomCrawler\Crawler;


class ProductParserTest extends \PHPUnit_Framework_TestCase{

    private $sampleHtml;

    private $url;

    protected function setUp()
    {
        $this->url ='http://www.sainsburys.co.uk/webapp/wcs/stores/servlet/CategoryDisplay?listView=true&orderBy=FAVOURITES_FIRST&parent_category_rn=12518&top_category=12518&langId=44&beginIndex=0&pageSize=20&catalogId=10137&searchTerm=&categoryId=185749&listId=&storeId=10151&promotionId=#langId=44&storeId=10151&catalogId=10137&categoryId=185749&parent_category_rn=12518&top_category=12518&pageSize=20&orderBy=FAVOURITES_FIRST&searchTerm=&beginIndex=0&hideFilters=true';

        $this->sampleHtml = <<<'HTML'
        <div class="product ">
	            <div class="productInner">
	                <div class="productInfoWrapper">
	                    <div class="productInfo">

	                                <h3>
	                                    <a href="http://www.sainsburys.co.uk/shop/gb/groceries/ripe---ready/sainsburys-papaya--ripe-%28each%29" onclick="s_objectID=&quot;http://www.sainsburys.co.uk/shop/gb/groceries/ripe---ready/sainsburys-papaya--ripe-%28each%29_1&quot;;return this.s_oc?this.s_oc(e):true" class="xh-highlight">
	                                        Sainsbury's Papaya, Ripe (each)
	                                        <img src="http://c2.sainsburys.co.uk/wcsstore7.11.1.161/ExtendedSitesCatalogAssetStore/images/catalog/productImages/46/0000000043946/0000000043946_M.jpeg" alt="">
	                                    </a>
	                                </h3>

    <div class="promotion">

            <p><a href="http://www.sainsburys.co.uk/webapp/wcs/stores/servlet/PromotionDisplayView?catalogId=10146&amp;langId=44&amp;productId=133408&amp;storeId=10151&amp;promotionId=10156314" onclick="s_objectID=&quot;http://www.sainsburys.co.uk/webapp/wcs/stores/servlet/PromotionDisplayView?catalogId=10146&amp;langId_3&quot;;return this.s_oc?this.s_oc(e):true">Save 25p:  was £1.50 now £1.25</a></p>

    </div>

								<div class="ThumbnailRoundel">
								<!--ThumbnailRoundel -->
        <a href="http://www.sainsburys.co.uk/webapp/wcs/stores/servlet/PromotionDisplayView?catalogId=10146&amp;langId=44&amp;productId=133408&amp;storeId=10151&amp;promotionId=10156314" onclick="s_objectID=&quot;http://www.sainsburys.co.uk/webapp/wcs/stores/servlet/PromotionDisplayView?catalogId=10146&amp;langId_4&quot;;return this.s_oc?this.s_oc(e):true"><img src="/wcsstore7.11.1.161/Sainsburys/Promotion assets/Promotion icons/SO_Save_X_Amt_S_Icon.gif" alt="Save 25p:  was £1.50 now £1.25"></a>

								</div>
								<div class="promoBages">
									<!-- PROMOTION -->
								</div>


	                        <!-- Review --><!-- BEGIN CatalogEntryRatingsReviewsInfo.jspf --><!-- productAllowedRatingsAndReviews: false --><!-- END CatalogEntryRatingsReviewsInfo.jspf -->
	                    </div>
	                </div>

	                <div class="addToTrolleytabBox">
	                <!-- addToTrolleytabBox LIST VIEW--><!-- Start UserSubscribedOrNot.jspf --><!-- Start UserSubscribedOrNot.jsp --><!--
			If the user is not logged in, render this opening
			DIV adding an addtional class to fix the border top which is removed
			and replaced by the tabs
		-->
		<div class="addToTrolleytabContainer addItemBorderTop">
	<!-- End AddToSubscriptionList.jsp --><!-- End AddSubscriptionList.jspf --><!--
	                        ATTENTION!!!
	                        <div class="addToTrolleytabContainer">
	                        This opening div is inside "../../ReusableObjects/UserSubscribedOrNot.jsp"
	                        -->
	                	<div class="pricingAndTrolleyOptions">
	    	                <div class="priceTab activeContainer priceTabContainer" id="addItem_133409">
	    	                    <div class="pricing">


<p class="pricePerUnit">
£1.25<abbr title="per">/</abbr><abbr title="unit"><span class="pricePerUnitUnit">unit</span></abbr>
</p>

    <p class="pricePerMeasure">£1.25<abbr title="per">/</abbr><abbr title="each"><span class="pricePerMeasureMeasure">ea</span></abbr>
    </p>


	    	                    </div>

	    	                                <div class="addToTrolleyForm ">

<form class="addToTrolleyForm" name="OrderItemAddForm_133409" action="OrderItemAdd" method="post" id="OrderItemAddForm_133409">
    <input type="hidden" name="storeId" value="10151">
    <input type="hidden" name="langId" value="44">
    <input type="hidden" name="catalogId" value="10122">
    <input type="hidden" name="URL" value="http://www.sainsburys.co.uk/webapp/wcs/stores/servlet/AjaxApplyFilterBrowseView?msg=&amp;langId=44&amp;storeId=10151&amp;catalogId=10137&amp;categoryId=185749&amp;parent_category_rn=12518&amp;top_category=12518&amp;pageSize=20&amp;orderBy=FAVOURITES_FIRST&amp;searchTerm=&amp;beginIndex=0&amp;hideFilters=true">
    <input type="hidden" name="errorViewName" value="AjaxApplyFilterBrowseView">
    <input type="hidden" name="SKU_ID" value="478755">

        <label class="access" for="quantity_133408">Quantity</label>

	        <input name="quantity" id="quantity_133408" type="text" size="3" value="1" class="quantity">


        <input type="hidden" name="catEntryId" value="133409">
        <input type="hidden" name="productId" value="133408">

    <input type="hidden" name="page" value="">
    <input type="hidden" name="contractId" value="">
    <input type="hidden" name="calculateOrder" value="1">
    <input type="hidden" name="calculationUsage" value="-1,-2,-3">
    <input type="hidden" name="updateable" value="1">
    <input type="hidden" name="merge" value="***">

   	<input type="hidden" name="callAjax" value="false">

         <input class="button process" type="submit" name="Add" value="Add">

</form>

	    <div class="numberInTrolley hidden numberInTrolley_133409" id="numberInTrolley_133409">

	    </div>

	    	                                </div>

	                        </div><!-- END priceTabContainer Add container --><!-- Subscribe container --><!-- Start AddToSubscriptionList.jspf --><!-- Start AddToSubscriptionList.jsp --><!-- End AddToSubscriptionList.jsp --><!-- End AddToSubscriptionList.jspf -->
	                    </div>
	                </div>
	            </div>
            </div>
        	</div>
HTML;

    }

    /**
     *  I should mock the calls to each product page but do not have time to tidy the HTML or do the mocking
     *  In this state these tests are an integration test
     */
    public function testGetProducts()
    {
        $stub = $this->getMockBuilder('AppBundle\Parser\PageFetcher')->getMock();
        $stub->method('fetchHtml')->willReturn($this->sampleHtml);

        $productParser = new ProductParser();

        $productsResponse = $productParser->getProducts($this->url);

        $this->assertInstanceOf('\AppBundle\ValueObj\ProductsResponse', $productsResponse);
    }
}