<?php
/**
 * @file
 *   Expose the CiviCRM cron feature to hostmaster.
 */

/**
 * Implementation of hook_hosting_feature().
 */
function hosting_civicrm_cron_hosting_feature() {
  $features['CiviCRM cron'] = array(
    'title' => t('CiviCRM cron queue'),
    'description' => t('Keeps track of running the CiviCRM cron process on all your CiviCRM sites.'),
    'status' => HOSTING_FEATURE_ENABLED,
    'module' => 'hosting_civicrm_cron',
    );
  return $features;
}
