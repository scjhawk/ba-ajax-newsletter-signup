<?php

class BlueAcorn_AjaxNewsletter_Model_Observer
{
    public function __construct()
    {

    }

    public function enableDisableAjaxNewsletter(Varien_Event_Observer $observer)
    {
        $this->_toggleModule('BlueAcorn_AjaxNewsletter');


    }

    protected function _toggleModule($moduleName)
    {
        echo Mage::helper('core/data')->isModuleEnabled('BlueAcorn_AjaxNewsletter');

        // Disable the module itself
        $nodePath = "modules/$moduleName/active";
        if (Mage::helper('core/data')->isModuleEnabled($moduleName))
        {
            Mage::getConfig()->setNode($nodePath, 'false', true);
        }

        // Disable its output as well (which was already loaded)
        $outputPath = "advanced/modules_disable_output/$moduleName";
        if (!Mage::getStoreConfig($outputPath)) {
            Mage::app()->getStore()->setConfig($outputPath, true);
        }
        die();
    }
}