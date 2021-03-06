<?php
/**
 * This file is part of the devcast.
 *
 * (c) Bernard Ng <ngandubernard@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repositories;

use App\Entities\UsersEntity;
use Core\Repositories\Repository;

/**
 * Class UsersRepository
 * @package App\Repositories
 * @author bernard-ng, https://bernard-ng.github.io
 */
class UsersRepository extends Repository
{

    /**
     * The table name in the database
     * @var string
     */
    protected $table = 'users';

    /**
     * Entity class
     * @var UsersEntity
     */
    protected $entity = UsersEntity::class;

    /**
     * Retrieve a record with a specific condition
     * @param string $field
     * @param $value
     * @return mixed
     */
    public function findWith(string $field, $value)
    {
        return $this->makeQuery()
            ->into($this->entity)
            ->from($this->table)
            ->select("{$this->table}.*")
            ->where("{$this->table}.{$field} = ?", [$field => $value])
            ->all()->get(0);
    }
}
