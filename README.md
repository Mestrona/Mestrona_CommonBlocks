Magento2 Module Mestrona_CommonBlocks
=====================================

This module is intended for developers.

Magento 2 Module with simple basic blocks

* Store Information
Templates
 * store_information.phtml - Address and Store Hours, for example for the footer
 * store_information/contact.phtml - Phone and Email Links

* CMS Block for Checkout

Planed:

* System Version (and maybe Git branch)

Basically, lots of more small, simple blocks should be added.
If you miss something, file an issue or - even better - a pull request.

Installation
------------

Install the module as usual using the composer client with the module name `mestrona/magento-module-commonblocks`.

Use
---

Add those blocks to your layout.
Example:

        <referenceContainer name="header.panel">
            <block class="Mestrona\CommonBlocks\Block\StoreInformation" name="header_info" after="skip_to_content"
                   template="Mestrona_CommonBlocks::store_information/contact.phtml" />
        </referenceContainer>
        <referenceContainer name="footer">
            <block class="Mestrona\CommonBlocks\Block\StoreInformation" name="footer_info" before="footer_links"
                   template="Mestrona_CommonBlocks::store_information.phtml" />
        </referenceContainer>

CMS Block for Checkout
----------------------

Add to your frontend/di.xml

    <type name="Mestrona\CommonBlocks\Model\CmsBlockCheckoutConfigProvider">
        <arguments>
            <argument name="blockIdentifier" xsi:type="string">identifier or ID of the block goes here</argument>
        </arguments>
    </type>


Add something like this to your checkout_index_index.xml (depends were you want to place the block)
       
    <?xml version="1.0"?>
    <page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" layout="checkout" xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
        <body>
            <referenceBlock name="checkout.root">
                <arguments>
                    <argument name="jsLayout" xsi:type="array">
                        <item name="components" xsi:type="array">
                            <item name="checkout" xsi:type="array">
                                <item name="children" xsi:type="array">
                                    <item name="steps" xsi:type="array">
                                        <item name="children" xsi:type="array">
                                            <item name="shipping-step" xsi:type="array">
                                                <item name="children" xsi:type="array">
                                                    <item name="shippingAddress" xsi:type="array">
                                                        <item name="children" xsi:type="array">
                                                            <item name="shipping-address-fieldset" xsi:type="array">
                                                                <item name="children" xsi:type="array">
                                                                    <item name="cms-block" xsi:type="array">
                                                                        <item name="component" xsi:type="string">uiComponent</item>
                                                                        <item name="config" xsi:type="array">
                                                                            <item name="template" xsi:type="string">Mestrona_CommonBlocks/cms-block</item>
                                                                        </item>
                                                                        <item name="sortOrder" xsi:type="string">125</item>
                                                                    </item>
                                                                </item>
                                                            </item>
                                                        </item>
                                                    </item>
                                                </item>
                                            </item>
                                        </item>
                                    </item>
                                </item>
                            </item>
                        </item>
                    </argument>
                </arguments>
            </referenceBlock>
        </body>
    </page>




About Us
========

[Mestrona GbR](http://www.mestrona.net/) offers Magento open source modules. If you are confronted with any bugs, you may want to open an issue here.

This module was co-developed with [iMi digital](https://github.com/iMi-digital).

In need of support or an implementation of a modul in an existing system, [free to contact us](mailto:support@mestrona.net). In this case, we will provide full service support for a fee.

Of course we provide development of closed-source moduls as well.


