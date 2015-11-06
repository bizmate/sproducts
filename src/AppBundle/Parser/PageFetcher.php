<?php
/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 06/11/15
 * Time: 00:13
 */

namespace AppBundle\Parser;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Cookie\SetCookie;

/**
 * Class PageFetcher
 * @package AppBundle\Parser
 */
class PageFetcher {

    /**
     * @var GuzzleClient
     */
    private $guzzle;

    /**
     * @var string
     */
    private $cookieString;

    /**
     * IDEALLY I would like to pass all dependencies in the constructorfunction __construct(GuzzleClient $guzzle)
     * But I do not have the time to structure the whole sample code correctly
     */
    function __construct()
    {
        $this->guzzle = new GuzzleClient();
        $this->cookieString = 'Apache=10.173.10.10.1446753422564879; SESSION_COOKIEACCEPT=true; WC_SESSION_ESTABLISHED=true; WC_PERSISTENT=AiJjtwv0Pj2X9FEgfulUdtTArGY%3d%0a%3b2015%2d11%2d05+19%3a57%3a02%2e573%5f1446753422566%2d68049%5f10151; WC_ACTIVEPOINTER=44%2c10151; WC_USERACTIVITY_-1002=%2d1002%2c10151%2cnull%2cnull%2cnull%2cnull%2cnull%2cnull%2cnull%2cnull%2cdaOKPkE2Tas60W4yIkZ%2fhpg1AzuTtabz%2fZjMmWGPjPs%2bB346yX4EfU%2fqKA3K%2fwv3q1dmn5AThx9I%0a0t4gKmRbGmYXH65Z2opbKMyS0o8iP%2fK%2bQ8pcj9P1%2fF02%2f9iz0ujvvARofXdglP2IEo2N5714n5L6%0aHLKnToNOv9zDsiJeN3D%2fdnAsvuIWWYLFXKCWkxTyE0hYl7m%2f5RlNEgxDRK%2fDtg%3d%3d; WC_GENERIC_ACTIVITYDATA=[8093669214%3atrue%3afalse%3a0%3a1sqkUCnkhAbTsJ55a%2fUBqGYTk9o%3d][com.ibm.commerce.context.audit.AuditContext|1446753422566%2d68049][com.ibm.commerce.store.facade.server.context.StoreGeoCodeContext|null%26null%26null%26null%26null%26null][CTXSETNAME|Store][com.sol.commerce.context.SolBusinessContext|null%26null%26null%26null%26null%26null%26null%26null%26false%26false%26false%26null%26false%26null%26false%26false%26null%26false%26false][com.ibm.commerce.context.globalization.GlobalizationContext|44%26GBP%2644%26GBP][com.ibm.commerce.catalog.businesscontext.CatalogContext|10122%26null%26false%26false%26false][com.ibm.commerce.context.preview.PreviewContext|null%26null%26false][com.ibm.commerce.context.base.BaseContext|10151%26%2d1002%26%2d1002%26%2d1][com.ibm.commerce.context.experiment.ExperimentContext|null][com.ibm.commerce.context.entitlement.EntitlementContext|10502%2610502%26null%26%2d2000%26null%26null%26null]; sbrycookie1=630263751; bt_sc_serialize=14467534248998408410; _msuuid_529av24112=6309D2FD-696D-40D2-992D-7E5AFC8AD3F5; JSESSIONID=0000Ajc3n7wdiTuJ189FILrFvgm:17bugkc7v; s_vnum=1448928000270%26vn%3D4; TS017d4e39_77=08c9268e8fab2800a14fdfca70ee11958a21645c477fc523f0294cf03c2236dd3ca2c6404d31929e2ce3973cca34c39f0805783cad8238000174a56f4a9d62d07fad19022b202a06d3b6cafbc6425ca6c0990bb52eea90adfcfb7fdd4c794bd92ec3015544f6856ae4b39eb02ef0ad5a; LIST_VIEW=true; REFERRER=http%3a%2f%2f127%2e0%2e0%2e1%3a8000%2f; sbrycookie2=FdrHbjOczkHbHbkHbHbUC; TS017d4e39=012af522e3970bc6ff421e8555d66ba549d15b4c13bcc7c24ec673bf8be13994653746e49952c546d84e0b54197d3d5478cab794ed4c492b560135cd0e84851c32c7c91e2beb266519e09d3b481b3011c53e2aed85956ff66a16352f74b858b77564319414387f2f114486f432d93aec72eada055aa6eb11b662cee37d8cbdfd1b59a25dc5fc2ac0bff10a1b71e2d6a3a02f21836aa47fe2b0eee59ecb8823a0bab04dd5ab1f734922cbb0238b3a9796c9305c07b84e272eab394600b63bbdd6fa15aaaad0573f2cf289e6e3e38cf2ebb98c3d083aa55b622cbe03e0b59eb7b2713f908e95; TS01cd64fc=012af522e3b7b127e51bfc9db7f480d46a9b91b99e1ee18502718a8e41f55c226f46be895bd14f5bba44355e73b72c7796843f0aa9; oa_products=|; oa_visited=|; oa_revenueincdel=|; oa_time=|; loginClicked=|; bt_espot_click=; bt_product_click=; mmcore.tst=0.219; s_cc=true; c=undefined127.0.0.1%3A8000127.0.0.1%3A8000; gpv_url=http%3A%2F%2Fwww.sainsburys.co.uk%2Fwebapp%2Fwcs%2Fstores%2Fservlet%2FTopCategoriesDisplay%3FcatalogId%3D10122%26langId%3D44%26storeId%3D10151; s_invisit=true; gpv_page=groceries%3Ahomepage; s_sq=; mmid=-1531660106%7CCQAAAAp42PjangwAAA%3D%3D; mmcore.pd=-234345096%7CCQAAAAoBQnjY+NqeDM5MxA8EABoaT2pI5tJIDwAAAL0kfwQb5tJIAAAAAP//////////AAZEaXJlY3QBngwEAAAAAAAAAAAAAP///////////////wAAAAAAAUU%3D; mmcore.srv=ldnvwcgeu02; __CT_Data=gpv=9&apv_194_www16=9; WRUID=0; bt_espot_var=; bt_productclickfrom=';
    }

    /**
     * @param $url
     * @return \Psr\Http\Message\StreamInterface
     */
    public function fetchHtml($url)
    {
        $response = $this->fetchPage($url);
        return (string) $response->getBody();
    }

    /**
     * @param $url
     * @return array
     */
    public function fetchHtmlAndSize($url)
    {
        $response = $this->fetchPage($url);
        $htmlAndSize = array(
            'html' => (string) $response->getBody(),
            'size' => $response->getBody()->getSize()
        );
        return $htmlAndSize;
    }

    /**
     * @param $url
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function fetchPage($url)
    {
        try{
            $cookie = new SetCookie();
            $cookie = $cookie->fromString($this->cookieString);
            $jar = new \GuzzleHttp\Cookie\CookieJar( false, array($cookie));
            return $request = $this->guzzle->get( $url , ['cookies' => $jar]);
        }
        catch(\Exception $e){
            echo 'Error in Page Fetcher: ' . var_export($e, true);
            //$this->logger->error('I should log something and handle things better rather than returning empty string');
        }
    }
}