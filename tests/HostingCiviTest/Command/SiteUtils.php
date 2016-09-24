<?php

namespace HostingCiviTest\Command;

class SiteUtils extends \HostingCiviTest\Command {
  /**
   * Returns the CiviCRM version.
   */
  public static function getCiviVerson($site) {
    $site .= '.aegir.example.com';

    $output = self::exec('drush @' . escapeshellcmd($site) . ' cvapi System.get --out=json', [], TRUE);

    $info = parse_json($output);

    if (isset($info['civi']['version'])) {
      return $info['civi']['version'];
    }

    throw new Exception("HostingCiviTest\Command::getCiviVerson: could not find CiviCRM version: " . $info);
  }
}
