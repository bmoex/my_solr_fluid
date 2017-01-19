<?php
namespace Serfhos\MySolrFluid\Solr\ViewHelper;

use ApacheSolrForTypo3\Solr\ViewHelper\ViewHelper;
use Serfhos\MySolrFluid\Utility\ViewUtility;

/**
 * ViewHelper: FluidRendering
 *
 * @package Serfhos\MySolrFluid\Solr\ViewHelper
 */
abstract class FluidRenderingViewHelper implements ViewHelper
{

    /**
     * Add variables to view logic
     *
     * @param \TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view
     * @param array $arguments
     * @return void
     */
    abstract public function addVariables(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view, $arguments = []);

    /**
     * Constructor, takes an optional array of arguments for initialisation
     *
     * @param array $arguments
     */
    public function __construct(array $arguments = [])
    {
    }

    /**
     * Renders the view helper
     *
     * @param array $arguments
     * @throws \Apache_Solr_ParserException
     * @return string
     */
    public function execute(array $arguments = [])
    {
        try {
            $arguments = array_map('trim', $arguments);
            $view = ViewUtility::getView();

            $templateName = $arguments[0];
            if ($this->isValidTemplateName($templateName)) {
                $view->setTemplate($templateName);
                $this->addVariables($view, $arguments);
                return $view->render();
            } else {
                throw new \Apache_Solr_ParserException('Invalid template name given in view', 1484597542411);
            }

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Only allow valid template name
     *
     * @param string $templateName
     * @return boolean
     */
    protected function isValidTemplateName($templateName)
    {
        return (bool)(preg_match('/[^a-z\s-]/i', $templateName)) === false;
    }
}
