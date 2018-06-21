<?php

namespace App\AuditDrivers;

use App\Models\Audit;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Drivers\Database as DatabaseAuditDriver;

class Niajiri extends DatabaseAuditDriver
{
    /**
     * {@inheritdoc}
     */
    public function audit(Auditable $model)
    {
        return Audit::create($model->toAudit());
    }
}
