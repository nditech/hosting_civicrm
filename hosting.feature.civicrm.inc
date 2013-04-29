<?php
/**
 * @file
 *   Expose CiviCRM features to hostmaster.
 */

/**
 * Implementation of hook_hosting_feature().
 */
function hosting_civicrm_hosting_feature() {
  $features['civicrm'] = array(
    'title' => t('CiviCRM'),
    // TODO: should we have multiple features? One for cron, another for multi vs. single db, &c.?
    //'description' => t('Keeps track of running the CiviCRM cron process on all your CiviCRM sites.'),
    'description' => t('Manage CiviCRM sites.'),
    'status' => HOSTING_FEATURE_DISABLED,
    'module' => 'hosting_civicrm',
    'group' => 'experimental'
    );
  return $features;
}
