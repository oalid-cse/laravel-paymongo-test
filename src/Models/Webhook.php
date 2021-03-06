<?php

namespace ABO\Paymongo\Models;

use ABO\Paymongo\Paymongo;

class Webhook extends BaseModel
{
    public const SOURCE_CHARGEABLE = 'source.chargeable';

    public function enable()
    {
        return (new Paymongo)->webhook()->enable($this);
    }

    public function disable()
    {
        return (new Paymongo)->webhook()->disable($this);
    }

    public function update($payload)
    {
        return (new Paymongo)->webhook()->update($this, $payload);
    }
}
