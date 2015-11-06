<?php
/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 06/11/15
 * Time: 03:05
 */

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ProductsCommand extends ContainerAwareCommand{
    protected function configure()
    {
        $this
            ->setName('products')
            ->setDescription('Fetch SProducts')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = 'http://www.sainsburys.co.uk/webapp/wcs/stores/servlet/CategoryDisplay?listView=true&orderBy=FAVOURITES_FIRST&parent_category_rn=12518&top_category=12518&langId=44&beginIndex=0&pageSize=20&catalogId=10137&searchTerm=&categoryId=185749&listId=&storeId=10151&promotionId=#langId=44&storeId=10151&catalogId=10137&categoryId=185749&parent_category_rn=12518&top_category=12518&pageSize=20&orderBy=FAVOURITES_FIRST&searchTerm=&beginIndex=0&hideFilters=true';
        $productParser = $this->getContainer()->get('product.parser');
        $products = $productParser->getProducts($url);

        $text = json_encode($products);

        $output->writeln($text);
    }
}