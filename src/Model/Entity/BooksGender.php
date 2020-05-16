<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BooksGender Entity
 *
 * @property int $id
 * @property int $book_id
 * @property int $gender_id
 *
 * @property \App\Model\Entity\Book $book
 * @property \App\Model\Entity\Gender $gender
 */
class BooksGender extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'book_id' => true,
        'gender_id' => true,
        'book' => true,
        'gender' => true,
    ];
}
