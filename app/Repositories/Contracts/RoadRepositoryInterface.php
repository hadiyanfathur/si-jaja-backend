<?php

namespace App\Repositories\Contracts;

interface RoadRepositoryInterface
{
    public function withLatestProgression();
    public function findByStatus($tatus);
    public function isDoneWithName($name);
}
