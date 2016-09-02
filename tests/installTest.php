<?php

namespace HostingCiviTest;

/**
 * Tests that phpunit is working.
 */
class installTest extends HostingCiviTestCase {
  /**
   * @param string|null $name
   */
  public function __construct($name = NULL) {
    parent::__construct($name);
  }

  /**
   * Called before the test functions will be executed.
   * this function is defined in PHPUnit_TestCase and overwritten
   * here
   */
  public function setUp() {
    Command\PlatformInstall::run('civicrm43d7');
    Command\PlatformInstall::run('civicrm44d7');
    Command\PlatformInstall::run('civicrm46d7');
    Command\PlatformInstall::run('civicrm46d6');
    Command\PlatformInstall::run('civicrm47d7');
  }

  /**
   * Called after the test functions are executed.
   * this function is defined in PHPUnit_TestCase and overwritten
   * here.
   */
  public function tearDown() {
    Command\PlatformDelete::run('civicrm43d7');
    Command\PlatformDelete::run('civicrm44d7');
    Command\PlatformDelete::run('civicrm46d7');
    Command\PlatformDelete::run('civicrm46d6');
    Command\PlatformDelete::run('civicrm47d7');
  }

  /**
   * Test the toString function.
   */
  public function testHello() {
    $result = 'hello';
    $expected = 'hello';
    $this->assertEquals($result, $expected);
  }

  /**
   * Test the installation and deletion of sites with CiviCRM.
   */
  public function testInstallAndDelete() {
/*
    $this->installSite('civicrm43d7', 'civicrm43d7-standard');
    $this->removeSite('civicrm43d7-standard');

    $this->installSite('civicrm44d7', 'civicrm44d7-standard');
    $this->removeSite('civicrm44d7-standard');

    $this->installSite('civicrm46d7', 'civicrm46d7-standard');
    $this->removeSite('civicrm46d7-standard');

    $this->installSite('civicrm46d6', 'civicrm46d6', 'default');
    $this->removeSite('civicrm46d6-default');
*/
  }

}
