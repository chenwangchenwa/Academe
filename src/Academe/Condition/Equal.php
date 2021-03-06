<?php

namespace Academe\Condition;

use Academe\Condition\Resolvers\EqualMongoDBResolver;
use Academe\Condition\Resolvers\EqualPDOResolver;
use Academe\Contracts\Connection\Condition as ConditionContract;
use Academe\Constant\ConnectionConstant;

class Equal extends BaseCondition implements ConditionContract
{
    /**
     * @var array
     */
    static protected $connectionToResolverClassMap = [
        ConnectionConstant::TYPE_MYSQL   => EqualPDOResolver::class,
        ConnectionConstant::TYPE_MONGODB => EqualMongoDBResolver::class,
    ];

    /**
     * @var array
     */
    protected $parameters;

    /**
     * Equal constructor.
     *
     * @param $field
     * @param $value
     */
    public function __construct($field, $value)
    {
        $this->parameters = [$field, $value];
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

}
