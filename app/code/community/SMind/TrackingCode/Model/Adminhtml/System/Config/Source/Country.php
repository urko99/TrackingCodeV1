<?php
/**
 * Shopper's mind certified shop satisfaction survey
 *
 * @author    Uros Grilc <info@urosgrilc.com>
 * @category  SMind
 * @package   TrackingCode
 * @copyright Copyright (c) 2016 Ceneje d.o.o. (https://www.ceneje.si)
 */

class SMind_TrackingCode_Model_Adminhtml_System_Config_Source_Country
{

  /**
   * Options getter
   *
   * @return array
   */
  public function toOptionArray()
  {
    return array(
      array('value' => 'sl', 'label' => Mage::helper('smind_trackingcode')->__('Slovenia')),
      array('value' => 'hr', 'label' => Mage::helper('smind_trackingcode')->__('Croatia')),
    );
  }

  /**
   * Get options in "key-value" format
   *
   * @return array
   */
  public function toArray()
  {
    return array(
      'sl' => Mage::helper('smind_trackingcode')->__('Slovenia'),
      'hr' => Mage::helper('smind_trackingcode')->__('Croatia'),
    );
  }

}
