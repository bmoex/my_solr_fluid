<?php
namespace Serfhos\MySolrFluid\Utility;

class ViewUtility
{

    /**
     * Generate view based on settings configured in plugin.tx_solr.fluidRendering
     *
     * @return \TYPO3\CMS\Fluid\View\StandaloneView
     */
    public static function getView()
    {
        $configuration = \ApacheSolrForTypo3\Solr\Util::getConfigurationFromPageId(
            $GLOBALS['TSFE']->id,
            'plugin.tx_solr.fluidRendering.'
        );

        $template = $configuration->getValueByPathOrDefaultValue('view.', []);

        $view = static::getStandaloneView();
        $view->setLayoutRootPaths($template['layoutRootPaths.']);
        $view->setPartialRootPaths($template['partialRootPaths.']);
        $view->setTemplateRootPaths($template['templateRootPaths.']);

        // Configure settings based on configuration
        $view->assign('settings', $configuration->getValueByPathOrDefaultValue('settings.', []));
        return $view;
    }

    /**
     * @return \TYPO3\CMS\Fluid\View\StandaloneView
     */
    protected static function getStandaloneView()
    {
        return \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Fluid\View\StandaloneView::class);
    }
}
