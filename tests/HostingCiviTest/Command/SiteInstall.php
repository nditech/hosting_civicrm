<?php

namespace HostingCiviTest\Command;

class SiteInstall {
  /**
   * Helper function to install a platform.
   */
  public static function run($platform_name, $site, $profile_name = 'standard') {
    // FIXME: normally we should use backend_invoke_foo(), but the
    // hostmaster context was not successfully bootstrapped, so the
    // commands aren't found.
    exec('drush @hm provision-civicrm-tests-install-site ' . drush_escapeshellarg($platform_name) . ' ' . drush_escapeshellarg($site) . ' ' . drush_escapeshellarg($profile_name));
    exec('drush @hm provision-civicrm-tests-run-pending');
  }
}
