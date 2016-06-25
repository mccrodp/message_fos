<?php
/**
 * @file
 * Message FOS Drupal Driver.
 */

namespace Drupal\message_fos\Entity;

use Drupal\user\Entity\User;
use FOS\Message\Model\PersonInterface;

/**
 * Defines the person entity class extending base user class.
 *
 * From base User class: 'The base table name here is plural, despite Drupal
 * table naming standards, because "user" is a reserved word in many databases.'
 */
class MessageFOSUser implements PersonInterface {

  /* @var User */
  protected $user;

  /**
   * Get the User id.
   *
   * @return int|mixed|null|string
   */
  public function getId() {
    return $this->user->id();
  }

  /**
   * Get Drupal user object.
   *
   * @return \Drupal\user\Entity\User
   */
  public function getUser() {
    return $this->user;
  }

  /**
   * Set Drupal user object.
   *
   * @param \Drupal\user\Entity\User $user
   */
  public function setUser(User $user) {
    $this->user = $user;
  }
}
