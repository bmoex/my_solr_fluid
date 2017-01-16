<?php
namespace Serfhos\MySolrFluid\Solr;

use ApacheSolrForTypo3\Solr\ViewHelper\ViewHelperProvider as SolrViewHelperProvider;
use Serfhos\MySolrFluid\Solr\ViewHelper\FluidObjectViewHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * ViewHelper provider for Solr. Is called by the solr extension and maps marker definitions to ViewHelper instances.
 */
class ViewHelperProvider implements SolrViewHelperProvider
{

    /**
     * Gets the view helpers
     *
     * @return array Array of ViewHelper instances with ViewHelper name as index
     */
    public function getViewHelpers()
    {
        return [
            'FLUID_OBJECT' => $this->getObjectManager()->get(FluidObjectViewHelper::class),
        ];
    }

    /**
     * @return ObjectManager
     */
    public function getObjectManager()
    {
        return GeneralUtility::makeInstance(ObjectManager::class);
    }

}
