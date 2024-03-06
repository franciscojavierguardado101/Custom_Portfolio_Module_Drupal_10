<?php

namespace Drupal\my_portfolio\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\image\Entity\Image;

/**
 * Defines the Portfolio Item entity.
 *
 * @ingroup portfolio
 */
class PortfolioItem extends ContentEntityBase {

  /**
   * {@inheritdoc}
   */
  public static function preCreate(EntityInterface $entity, $clone) {
    parent::preCreate($entity, $clone);
    $entity->setNewRevision();
  }

  /**
   * {@inheritdoc}
   */
  public function getBaseFieldDefinitions() {
    $fields = parent::getBaseFieldDefinitions();

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Project Title'))
      ->setRequired(TRUE);

    $fields['field_client'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Client'));

    $fields['field_description'] = BaseFieldDefinition::create('text_long')
      ->setLabel(t('Description'));

    $fields['field_images'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Images'))
      ->setSetting('target_type', 'image')
      ->setSetting('style', 'medium')
      ->setCardinality(FieldInterface::CARDINALITY_UNLIMITED);

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityType() {
    return $this->entityType;
  }

  /**
   * {@inheritdoc}
   */
  public static function entityTypeLabel() {
    return t('Portfolio Item');
  }
}
