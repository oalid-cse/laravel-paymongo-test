<?php

namespace ABO\Paymongo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \ABO\Paymongo\Paymongo payment()
 * @method static \ABO\Paymongo\Paymongo paymentIntent()
 * @method static \ABO\Paymongo\Paymongo source()
 * @method static \ABO\Paymongo\Paymongo webhook()
 * @method static \ABO\Paymongo\Paymongo paymentMethod()
 * @method static \ABO\Paymongo\Paymongo token() @deprecated 1.2.0
 * @method static mixed create(array $payload)
 * @method static mixed find(string $id)
 * @method static mixed all()
 * @method static mixed enable()
 * @method static mixed disable()
 */
class Paymongo extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'paymongo';
    }
}
