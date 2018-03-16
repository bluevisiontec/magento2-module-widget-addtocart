<?php
/**
 * @package   BlueVisionTec\WidgetAddToCart
 * @author    Reinhard Schneidewind <info@bluevisiontec.de>
 * @copyright © 2018 BlueVisionTec UG (haftungsbeschränkt)
 * @license   See LICENSE file for license details.
 */
 
namespace BlueVisionTec\WidgetAddToCart\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

/**
* AddToCart widget block
*/
class AddToCart extends Template implements BlockInterface
{
    /**
     * @var _template
     */
    protected $_template = "widget/addtocart.phtml";
    
    /**
     * Returns the add to cart url for the given product or false if product not found
     *
     * @return string|false
     */
    public function getAddToCartUrl()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $productId = $this->getData('productid');
        $product = $objectManager->get('Magento\Catalog\Model\Product')->load($productId);
        
        if(!$product) {
            return false;
        }
        
        return $objectManager->get('Magento\Checkout\Helper\Cart')->getAddUrl($product);
    }
    
}
