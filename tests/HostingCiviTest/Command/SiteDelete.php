<?php

namespace HostingCiviTest\Command;

class SiteDelete {
  /**
   * Helper function to install a platform.
   */
  public static function run($site) {
    // FIXME: normally we should use backend_invoke_foo(), but the
    // hostmaster context was not successfully bootstrapped, so the
    // commands aren't found.
    exec('drush @hm provision-civicrm-tests-delete-site @' . drush_escapeshellarg($site) . '.aegir.example.com');
    exec('drush @hm provision-civicrm-tests-run-pending');
  }
}
