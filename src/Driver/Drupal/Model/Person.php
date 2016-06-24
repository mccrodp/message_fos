<?php
/**
 * @file
 * Message FOS Drupal Driver.
 */

namespace Drupal\message_fos\Driver\Driver\Model;

use Drupal\user\Entity\User;
use FOS\Message\Model\PersonInterface;

class Person extends User implements PersonInterface {

    /**
     * Get the User id.
     *
     * @return int|mixed|null|string
     */
    public function getId() {
        return $this->id();
    }
}