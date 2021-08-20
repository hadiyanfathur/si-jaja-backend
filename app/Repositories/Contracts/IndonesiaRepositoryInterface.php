<?php

namespace App\Repositories\Contracts;

interface IndonesiaRepositoryInterface
{
    public function findByNameAndReference(string $name, array $reference, int $limit);
}
