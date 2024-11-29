<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Models;

use FranklinEkemezie\ComputerVisionAfrica\Core\Database;

abstract class BaseModel
{

    protected Database $db;

    public function __construct(
        private array $dbConfig
    )
    {
        $this->db = new Database($dbConfig);
    }

}