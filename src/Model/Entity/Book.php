<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property string $title
 *
 * @property \App\Model\Entity\Loan[] $loans
 * @property \App\Model\Entity\Author[] $authors
 * @property \App\Model\Entity\Gender[] $genders
 */
class Book extends Entity
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
        'title' => true,
        'loans' => true,
        'authors' => true,
        'genders' => true,
        'availiable' => true,
        'publisher_id' =>true,
    ];
}
