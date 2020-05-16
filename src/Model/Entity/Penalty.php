<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Penalty Entity
 *
 * @property int $id
 * @property float $value
 * @property int $customer_id
 * @property bool $payed
 * @property int $loan_id
 */
class Penalty extends Entity
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
        'value' => true,
        'customer_id' => true,
        'payed' => true,
        'loan_id' => true,
    ];
}
