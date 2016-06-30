<?php
/**
 * @file
 * Message FOS Drupal Driver.
 */

namespace Drupal\message_fos;

use Drupal\Core\Entity\EntityTypeManager;
use FOS\Message\Model\ConversationInterface;
use FOS\Message\Model\PersonInterface;
use FOS\Message\Model\TagInterface;

/**
 * Driver for Drupal.
 */
class DrupalDriver extends AbstractDrupalDriver {
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
    $conversationClass = 'Drupal\message_private\Entity\Conversation',
    $conversationPersonClass = 'FOS\Message\Driver\Doctrine\ORM\Entity\ConversationPerson',
    $messageClass = 'Drupal\message\Entity\Message',
    $messagePersonClass = 'FOS\Message\Driver\Doctrine\ORM\Entity\MessagePerson'
  ) {
    parent::__construct(
      $entityTypeManager,
      $conversationClass,
      $conversationPersonClass,
      $messageClass,
      $messagePersonClass
    );
  }

  /**
   * {@inheritdoc}
   */
  public function findPersonConversations(PersonInterface $person, TagInterface $tag = NULL) {
//    $qb = $this->createConversationQueryBuilder();
//
//    // Last message date order
//    $lastMessageDateSubquery = $this->entityTypeManager->createQueryBuilder()
//      ->select('MAX(lmds.read)')
//      ->from($this->getMessagePersonClass(), 'lmds')
//      ->leftJoin('lmds.message', 'lmdsm')
//      ->where('lmds.person = :person')
//      ->andWhere('IDENTITY(lmdsm.conversation) = c.id')
//      ->getDQL();
//
//    $qb->addSelect('(' . $lastMessageDateSubquery . ') AS HIDDEN lastMessageDate');
//    $qb->orderBy('lastMessageDate', 'DESC');
//
//    // Person filter
//    $personSubquery = $this->entityTypeManager->createQueryBuilder()
//      ->select('IDENTITY(pfcp.conversation)')
//      ->from($this->getConversationPersonClass(), 'pfcp')
//      ->where('pfcp.person = :person')
//      ->getDQL();
//
//    $qb->where($qb->expr()->in('c.id', $personSubquery));
//    $qb->setParameter('person', $person->getId());
//
//    // Tag filter
//    if ($tag !== NULL) {
//      $tag = $tag->getName();
//
//      $tagSubquerey = $this->objectManager->createQueryBuilder()
//        ->select('IDENTITY(tfcp.conversation)')
//        ->from($this->getConversationPersonClass(), 'tfcp')
//        ->leftJoin('tfcp.tags', 'tft')
//        ->where('tft.name = :tag')
//        ->getDQL();
//
//      $qb->andWhere($qb->expr()->in('c.id', $tagSubquerey));
//      $qb->setParameter('tag', $tag);
//    }
//
//    return new ArrayCollection($qb->getQuery()->getResult());
  }

  /**
   * Create a conversation query builder with optimized joins.
   *
   * @return \Doctrine\ORM\QueryBuilder
   */
  private function createConversationQueryBuilder() {
//    return $this->objectManager->createQueryBuilder()
//      ->select('c', 'cp', 'p', 't', 'm', 'mp')
//      ->from($this->getConversationClass(), 'c')
//      ->leftJoin('c.persons', 'cp')
//      ->leftJoin('cp.person', 'p')
//      ->leftJoin('cp.tags', 't')
//      ->leftJoin('c.messages', 'm')
//      ->leftJoin('m.persons', 'mp')
//      ->orderBy('m.date', 'ASC')
//      ->addOrderBy('m.id', 'ASC');
  }

  /**
   * {@inheritdoc}
   */
  public function findConversationPerson(ConversationInterface $conversation, PersonInterface $person) {
//    return $this->objectManager->createQueryBuilder()
//      ->select('cp', 'c', 'p', 't')
//      ->from($this->getConversationPersonClass(), 'cp')
//      ->innerJoin('cp.conversation', 'c')
//      ->innerJoin('cp.person', 'p')
//      ->leftJoin('cp.tags', 't')
//      ->where('c.id = :conversation')
//      ->setParameter('conversation', $conversation->getId())
//      ->andWhere('p.id = :person')
//      ->setParameter('person', $person->getId())
//      ->setMaxResults(1)
//      ->getQuery()
//      ->getOneOrNullResult();
  }

  /**
   * {@inheritdoc}
   */
  public function findConversation($id) {
//    return $this->createConversationQueryBuilder()
//      ->where('c.id = :id')
//      ->setParameter('id', $id)
//      ->getQuery()
//      ->getOneOrNullResult();
  }

  /**
   * {@inheritdoc}
   */
  public function findMessages(ConversationInterface $conversation, $offset = 0, $limit = 20, $sortDirection = 'ASC') {
//    $qb = $this->objectManager->createQueryBuilder()
//      ->select('m', 's')
//      ->from($this->getMessageClass(), 'm')
//      ->leftJoin('m.sender', 's')
//      ->where('m.conversation = :conversation')
//      ->setParameter('conversation', $conversation->getId())
//      ->setMaxResults($limit)
//      ->setFirstResult($offset)
//      ->orderBy('m.date', $sortDirection)
//      ->addOrderBy('m.id', $sortDirection);
//
//    return new ArrayCollection($qb->getQuery()->getResult());
  }
}
