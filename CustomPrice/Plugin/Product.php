<?php

namespace KK\CustomPrice\Plugin;

class Product
{
    protected $scopeConfig;

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        // $valueFromConfig = $this->scopeConfig->getValue(
        //     'kk_customprice/general/custom_price',
        //     \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        // );


        if ($this->scopeConfig->getValue('kk_customprice/general/enabled', \Magento\Store\Model\ScopeInterface::SCOPE_STORE)) {
            $valueFromConfig = $this->scopeConfig->getValue(
                'kk_customprice/general/custom_price',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );

            $result += $valueFromConfig;
        }

        return $result;

    }
}
