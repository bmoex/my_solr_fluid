<?php
namespace Serfhos\MySolrFluid\Solr\ViewHelper;

/**
 * ViewHelper: Fluid Object
 * Requirements:
 *      TypoScript Configured in plugin.tx_solr.fluidRendering
 *      Example see: EXT:my_solr_fluid/Configuration/TypoScript/Example/setup.ts
 *
 * Usage:
 *      ###FLUID_OBJECT: <TEMPLATENAME> | <OBJECT> ###
 *
 * Example:
 *      ###FLUID_OBJECT: Example | ###RESULT_DOCUMENT### ###
 *
 * Output:
 *      Parsed html content found in EXT:my_template/Resources/Private/Templates/Solr/Example.html
 *
 * @package Serfhos\MySolrFluid\Solr\ViewHelper
 */
class FluidObjectViewHelper extends FluidRenderingViewHelper
{

    /**
     * Add variables to view logic
     *
     * @param \TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view
     * @param array $arguments
     * @return void
     */
    public function addVariables(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view, $arguments = [])
    {
        $document = unserialize($arguments[1]);
        $as = $arguments[2] ?: 'object';
        if ($document) {
            $view->assign($as, $document);
        }
    }

}
