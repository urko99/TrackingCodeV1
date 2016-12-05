<?php
/**
 * Shopper's mind certified shop satisfaction survey
 *
 * @author    Uros Grilc <info@urosgrilc.com>
 * @category  SMind
 * @package   TrackingCode
 * @copyright Copyright (c) 2016 Ceneje d.o.o. (https://www.ceneje.si)
 */

class SMind_TrackingCode_Helper_Data extends Mage_Core_Helper_Abstract
{
  const CONFIG_PATH = 'smind_trackingcode/';

  /**
   * Config meta method for getting config
   *
   * @param string $code
   * @param string $group
   * @return mixed
   */
  public function getConfig($code, $group)
  {
    return Mage::getStoreConfig(self::CONFIG_PATH . "$group/$code");
  }

  /**
   * Is Conversion enabled
   *
   * @return boolean
   */
  public function isEnabled()
  {
    return $this->getConfig('enabled', 'settings');
  }

  /**
   * Project Key from system config
   *
   * @return string
   */
  public function getKey()
  {
    return $this->getConfig('key', 'settings');

  }

  /**
   * Selected Country from system config
   *
   * @return string
   */
  public function getCountry()
  {
    return $this->getConfig('country', 'settings');

  }
}