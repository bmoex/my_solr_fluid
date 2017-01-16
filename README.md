# TYPO3 Extension: my_solr_fluid
TYPO3 Extension: Extend (solr) - Use fluid functionality; template, partials and layouts!

Keywords: TYPO3, Solr, Fluid

Usage
-----
1) Install extension
2) Configure TypoScript in your template
   * Example: Configuration/TypoScript/Example/setup.ts
3) Define rendering in EXT:Solr Marker templating
   * `###FLUID_OBJECT: <TEMPLATENAME> | <OBJECT> ###`
       * Example: `###FLUID_OBJECT: Object | ###RESULT_DOCUMENT### ###`
   * Add Object.html to configured path
       * In example my_template/Resources/Private/Templates/Solr/Object.html
4) Do your magic in Object.html!



Questions?
----------
I tried to do my magic in Solr but got hopelessly lost. Try the Slack channel ext-solr.
https://typo3.slack.com/archives/ext-solr
