<?php

namespace Mestrona\CommonBlocks\Block;

use Magento\Store\Model\ScopeInterface;

/**
 * Store information block
 */
class StoreInformation extends \Magento\Framework\View\Element\Template implements \Magento\Framework\DataObject\IdentityInterface
{
    protected $_copyright;

    /**
     * @var \Magento\Framework\App\Http\Context
     */
    protected $httpContext;

    /**
     * @var \Magento\Store\Model\Information
     */
    protected $information;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\App\Http\Context $httpContext
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Store\Model\Information $information,
        array $data = []
    ) {
        $this->httpContext = $httpContext;
        $this->information = $information;
        parent::__construct($context, $data);
    }

    public function getStoreInformationObject()
    {
        return $this->information->getStoreInformationObject($this->_storeManager->getStore());
    }

    public function getAddress()
    {
        return $this->information->getFormattedAddress($this->_storeManager->getStore());

    }

    public function getHours()
    {
        return $this->getStoreInformationObject()->getHours();
    }

    public function getPhone()
    {
        return $this->getStoreInformationObject()->getPhone();
    }

    public function getEMail()
    {
        return $this->_scopeConfig->getValue('trans_email/ident_support/email',ScopeInterface::SCOPE_STORE);
    }

    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [\Magento\Store\Model\Store::CACHE_TAG, \Magento\Cms\Model\Block::CACHE_TAG];
    }
}