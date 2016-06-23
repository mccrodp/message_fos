<?php

/**
 * @file
 * Message FOS Abstract Drupal Driver.
 */

namespace Drupal\MessageFOS\Driver\Drupal;

use Doctrine\Common\Persistence\ObjectManager;
use FOS\Message\Driver\AbstractDriver;
use FOS\Message\Model\ConversationInterface;
use FOS\Message\Model\ConversationPersonInterface;
use FOS\Message\Model\MessageInterface;
use FOS\Message\Model\MessagePersonInterface;

/**
 * Abstract driver for Doctrine persistence managers (ORM and ODM).
 *
 * @author Titouan Galopin <galopintitouan@gmail.com>
 */
abstract class AbstractDrupalDriver extends AbstractDriver
{
    /**
     * @var ObjectManager|EntityManager
     */
    protected $objectManager;

    /**
     * Constructor.
     *
     * @param ObjectManager $objectManager
     * @param string        $conversationClass
     * @param string        $conversationPersonClass
     * @param string        $messageClass
     * @param string        $messagePersonClass
     */
    public function __construct(
        ObjectManager $objectManager,
        $conversationClass,
        $conversationPersonClass,
        $messageClass,
        $messagePersonClass
    ) {
        parent::__construct($conversationClass, $conversationPersonClass, $messageClass, $messagePersonClass);

        $this->objectManager = $objectManager;
    }

    /**
     * {@inheritdoc}
     */
    public function persistConversation(ConversationInterface $conversation)
    {
        $this->objectManager->persist($conversation);
    }

    /**
     * {@inheritdoc}
     */
    public function persistConversationPerson(ConversationPersonInterface $conversationPerson)
    {
        $this->objectManager->persist($conversationPerson);
    }

    /**
     * {@inheritdoc}
     */
    public function persistMessage(MessageInterface $message)
    {
        $this->objectManager->persist($message);
    }

    /**
     * {@inheritdoc}
     */
    public function persistMessagePerson(MessagePersonInterface $messagePerson)
    {
        $this->objectManager->persist($messagePerson);
    }

    /**
     * {@inheritdoc}
     */
    public function flush()
    {
        $this->objectManager->flush();
    }
}
