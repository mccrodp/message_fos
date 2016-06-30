<?php

/**
 * @file
 * Message FOS Abstract Drupal Driver.
 */

namespace Drupal\message_fos;

use Drupal\Core\Entity\EntityTypeManager;
use FOS\Message\Driver\AbstractDriver;
use FOS\Message\Model\ConversationInterface;
use FOS\Message\Model\ConversationPersonInterface;
use FOS\Message\Model\MessageInterface;
use FOS\Message\Model\MessagePersonInterface;

/**
 * Abstract driver for Drupal entity manager.
 */
abstract class AbstractDrupalDriver extends AbstractDriver {
  /**
   * @var EntityTypeManager
   */
  protected $entityTypeManager;

  /**
   * Constructor.
   *
   * @param EntityTypeManager $entityTypeManager
   * @param string $conversationClass
   * @param string $conversationPersonClass
   * @param string $messageClass
   * @param string $messagePersonClass
   */
  public function __construct(
    EntityTypeManager $entityTypeManager,
    $conversationClass,
    $conversationPersonClass,
    $messageClass,
    $messagePersonClass
  ) {
    parent::__construct($conversationClass, $conversationPersonClass, $messageClass, $messagePersonClass);

    $this->entityTypeManager = $entityTypeManager;
  }

  /**
   * {@inheritdoc}
   */
  public function persistConversation(ConversationInterface $conversation) {
    $this->entityTypeManager->getStorage('conversation')->create($conversation);
  }

  /**
   * {@inheritdoc}
   */
  public function persistConversationPerson(ConversationPersonInterface $conversationPerson) {
    $this->entityTypeManager->getStorage('conversation_person')->create($conversationPerson);
  }

  /**
   * {@inheritdoc}
   */
  public function persistMessage(MessageInterface $message) {
    $this->entityTypeManager->getStorage('message')->create($message);
  }

  /**
   * {@inheritdoc}
   */
  public function persistMessagePerson(MessagePersonInterface $messagePerson) {
    $this->entityTypeManager->getStorage('message_person')->create($messagePerson);
  }

  /**
   * {@inheritdoc}
   */
  public function flush() {
    // @todo what is the persistence layer doing here and do we need a Drupal equivalent?
  }
}
