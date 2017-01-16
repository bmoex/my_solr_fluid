plugin.tx_solr.fluidRendering {
    view {
        templateRootPaths {
            10 = EXT:my_template/Resources/Private/Templates/Solr
        }

        partialRootPaths {
            10 = EXT:my_template/Resources/Private/Templates/Partials/Solr
        }

        layoutRootPaths {
            10 = EXT:my_template/Resources/Private/Templates/Layouts/Solr
        }
    }

    settings {
        pages {
            homepage = 1
        }
    }
}
