<?php
/**
 * This file is part of the devcast.
 *
 * (c) Bernard Ng <ngandubernard@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace App\Validators;

use Core\Repositories\ValidatorInterface;
use Respect\Validation\Validator as v;

/**
 * Class CategoriesValidator
 * Implementation for categories
 * @package App\Repositories\Validators
 * @author bernard-ng, https://bernard-ng.github.io
 */
abstract class CategoriesValidator implements ValidatorInterface
{
    /**
     * Validation rules
     * @var array
     */
    private static $validationRules = [];

    /**
     * Validation rules when there is an update
     * @var array
     */
    private static $updateValidationRules = [];

    /**
     * List of fields that can be stored in the Repository
     * @var array
     */
    private static $storeAbleFields = [];

    /**
     * List of fields that can be updated in the Repository
     * @var array
     */
    private static $updateAbleFields = ['name', 'slug', 'description'];

    /**
     * Retrieve validation rules
     * @return array
     */
    public static function getValidationRules(): array
    {
        if (empty(self::$validationRules)) {
            self::$validationRules = [
                'name' => v::notEmpty()->setName('Name'),
                'slug' => v::optional(v::slug())->setName('Slug'),
                'description' => v::notEmpty()->notBlank()->setName('Description'),
            ];
        }
        return self::$validationRules;
    }

    /**
     * Retrieve update validation rules
     * @return array
     */
    public static function getUpdateValidationRules(): array
    {
        if (empty(self::$updateValidationRules)) {
            self::$validationRules = [
                'name' => v::notEmpty()->setName('Name'),
                'slug' => v::optional(v::slug())->setName('Slug'),
                'description' => v::notEmpty()->notBlank()->setName('Description'),
            ];
        }
        return self::$updateValidationRules;
    }

    /**
     * rRetrieve the list of storeable fields
     * @return array
     */
    public static function getStoreAbleFields(): array
    {
        if (empty(self::$storeAbleFields)) {
            self::$storeAbleFields = array_keys(self::getValidationRules());
        }
        return self::$storeAbleFields;
    }

    /**
     * Retrieve the list of updateable fields
     * @return array
     */
    public static function getUpdateAbleFields(): array
    {
        if (empty(self::$updateAbleFields)) {
            self::$updateAbleFields = array_keys(self::getUpdateValidationRules());
        }
        return self::$updateAbleFields;
    }
}
