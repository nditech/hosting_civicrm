<?php

namespace HostingCiviTest\Command;

class PlatformDelete {

  /**
   * Helper function to remove a platform.
   */
  public static function run($platform_name) {
    // FIXME: normally we should use backend_invoke_foo(), but the
    // hostmaster context was not successfully bootstrapped, so the
    // commands aren't found.
    exec('drush @hm hosting-task ' . drush_escapeshellarg("@platform_$platform_name") . ' delete');
    exec('drush @hm provision-civicrm-tests-run-pending');
  }

}
