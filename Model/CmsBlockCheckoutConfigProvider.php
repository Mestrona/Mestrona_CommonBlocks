<?php

namespace Mestrona\CommonBlocks\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Cms\Block\Widget\Block;

/**
 * Config provider to fetch the content of a CMS Static Block
 *
 * See readme on how to use this
 *
 * Basesd on https://magento.stackexchange.com/a/173328/81
 */
class CmsBlockCheckoutConfigProvider implements ConfigProviderInterface
{
    /**
     * CmsBlockCheckoutConfigProvider constructor.
     *
     * @param Block $block
     * @param string $blockIdentifier ID or identifier (code) of the block
     */
    protected $cmsBlockRepository;

    public function __construct(
        Block $block,
        string $blockIdentifier
    )
    {
        if (is_numeric($blockIdentifier)) {
            $blockId = (int) $blockIdentifier;
        } else {
            $blockId = (string) $blockIdentifier; // loader of block works with a string as well
        }

        if (!$blockId) {
            return;
        }

        $this->cmsBlockWidget = $block;
        $block->setData('block_id', $blockId);
        $block->setTemplate('Magento_Cms::widget/static_block/default.phtml');
    }

    public function getConfig()
    {
        if (!$this->cmsBlockWidget) {
            return [];
        }

        return [
            'cmsBlockHtml' => $this->cmsBlockWidget->toHtml()
        ];
    }
}