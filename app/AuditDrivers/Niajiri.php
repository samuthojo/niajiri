<?php

namespace App\AuditDrivers;

use App\Audit;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Drivers\Database as DatabaseAuditDriver;

class Walimu extends DatabaseAuditDriver
{
    /**
     * {@inheritdoc}
     */
    public function audit(Auditable $model)
    {
        return Audit::create($model->toAudit());
    }
}
