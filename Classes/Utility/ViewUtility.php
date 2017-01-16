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
        static::validateViewConfiguration($template);

        $view = static::getStandaloneView();
        $view->setLayoutRootPaths($template['layoutRootPaths.']);
        $view->setPartialRootPaths($template['partialRootPaths.']);
        $view->setTemplateRootPaths($template['templateRootPaths.']);

        // Configure settings based on configuration
        $view->assign('settings', $configuration->getValueByPathOrDefaultValue('settings.', []));
        return $view;
    }

    /**
     * Validate view configuration
     *
     * @param array $configuration
     * @return bool
     * @throws \Apache_Solr_ParserException
     */
    protected static function validateViewConfiguration($configuration)
    {
        if (empty($configuration['templateRootPaths.'])) {
            throw new \Apache_Solr_ParserException('Invalid template root paths configured', 1484599682929);
        } 
        return true;
    }

    /**
     * @return \TYPO3\CMS\Fluid\View\StandaloneView
     */
    protected static function getStandaloneView()
    {
        return \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Fluid\View\StandaloneView::class);
    }
}
