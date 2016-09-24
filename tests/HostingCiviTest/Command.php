<?php

namespace HostingCiviTest;

use Exception;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Command {

  /**
   * Wrapper for exec() using Symfony's Process class.
   * Throws an Exception if anything is sent on stderr.
   *
   * @param string $command Base command to execute.
   * @param array $args Command arguments (they get automatically escaped).
   * @param boolean $return_output Return the command output, instead of echoing it.
   *
   * @throws ProcessFailedException, Exception
   *
   * @link http://symfony.com/doc/current/components/process.html
   */
  function exec($command, $args = [], $return_output = FALSE) {
    $output = '';

    if (is_array($args)) {
      foreach ($args as $arg) {
        $command .= ' ' . drush_escapeshellarg($arg);
      }
    }
    elseif (!empty($args)) {
      throw new Exception("exec: args must be wrapped in an array.");
    }

    $process = new Process($command);
    $process->start();

    foreach ($process as $type => $data) {
      if ($type === $process::OUT) {
        if ($return_output) {
          $output .= "$data\n";
        }
        else {
          echo "$data\n";
        }
      }
      else {
        // $type === $process::ERR
        // NB: drush outputs all status messages on stderr
        // https://github.com/drush-ops/drush/issues/707
        echo "$data\n";

        if (strpos($data, '[error]') !== FALSE) {
          // Ignore this error, doesn't affect PHP >= 5.6
          // https://docs.acquia.com/articles/php-56-and-mbstringhttpinput-errors
          if (strpos($data, 'Multibyte string input conversion in PHP is active') === FALSE) {
            throw new Exception("Exec stderror: $data");
          }
        }
      }
    }

    if (!$process->isSuccessful()) {
      throw new ProcessFailedException($process);
    }

    if ($return_output) {
      return $output;
    }

    return TRUE;
  }

}
