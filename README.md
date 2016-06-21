Magento2 Module Mestrona_CommonBlocks
=====================================

Magento 2 Module with simple basic blocks

* Store Information
Templates
 * store_information.phtml - Address and Store Hours, for example for the footer
 * store_information/contact.phtml - Phone and Email Links

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

About Us
========

[Mestrona GbR](http://www.mestrona.net/) offers Magento open source modules. If you are confronted with any bugs, you may want to open an issue here.

In need of support or an implementation of a modul in an existing system, [free to contact us](mailto:support@mestrona.net). In this case, we will provide full service support for a fee.

Of course we provide development of closed-source moduls as well.
