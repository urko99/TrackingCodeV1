<?php
/**
 * Shopper's mind certified shop satisfaction survey
 *
 * @author    Uros Grilc <info@urosgrilc.com>
 * @category  SMind
 * @package   TrackingCode
 * @copyright Copyright (c) 2016 Ceneje d.o.o. (https://www.ceneje.si)
 */

class SMind_TrackingCode_Block_Code extends Mage_Core_Block_Template
{
  /**
   * Module enabled setting
   *
   * @return boolean
   */
  public function isEnabled()
  {
    return $this->helper('smind_trackingcode')->isEnabled();
  }

  /**
   * Project key getter
   *
   * @return string
   */
  public function getProjectKey()
  {
    return $this->helper('smind_trackingcode')->getKey();
  }

  /**
   * Target server getter
   *
   * @return string
   */
  public function getServerUrl()
  {
    switch ($this->helper('smind_trackingcode')->getCountry()) {
      case 'sl':
        return "cpx.smind.si";
        break;

      case 'hr':
        return "cpx.smind.hr";
        break;

      default:
        return "cpx.smind.si";
        break;
    }
  }

  /**
   * Retrieve identifier of created order
   *
   * @return string
   */
  public function getOrderId()
  {
    if (!empty($orderId = $this->_getData('order_id'))){
      return $orderId;
    } else {
      $this->_fillOrderData();
      return $this->_getData('order_id');
    }
  }

  /**
   * Products list with details getter
   *
   * @return array
   */
  public function getProducts()
  {
    if (!empty($products = $this->_getData('products'))){
      return $products;
    } else {
      $this->_fillOrderData();
      return $this->_getData('products');
    }
  }

  /**
   * Get last order ID from session and fill required data
   */
  protected function _fillOrderData()
  {
    $orderId = Mage::getSingleton('checkout/session')->getLastOrderId();
    if ($orderId) {
      $order = Mage::getModel('sales/order')->load($orderId);
      if ($order->getId()) {
        $this->addData(array(
          'order_id'  => $order->getIncrementId(),
          'products'  => $this->_prepareDataArray($order)
        ));
      }
    }
  }

  /**
   * Get last order ID from session and fill required data
   *
   * @param Mage_Sales_Model_Order $order
   * @return array
   */
  protected function _prepareDataArray(Mage_Sales_Model_Order $order)
  {
    $products = array();
    $items = $order->getAllVisibleItems();

    foreach ($items as $item){
      array_push($products, array(
        "id"    =>  $item->getSku(),
        "name"  =>  $item->getName(),
        "price" =>  $item->getPriceInclTax(),
        "qty"   =>  $item->getQtyOrdered(),
      ));
    }

    return $products;
  }
}
