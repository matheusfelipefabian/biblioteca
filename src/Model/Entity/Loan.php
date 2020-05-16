<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Loan Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\FrozenDate $prazo
 * @property int $book_id
 * @property boolean $book_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Book $book
 */
class Loan extends Entity
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
        'customer_id' => true,
        'date' => true,
        'prazo' => true,
        'book_id' => true,
        'active' => true,
        'customer' => true,
        'book' => true,
    ];
}
