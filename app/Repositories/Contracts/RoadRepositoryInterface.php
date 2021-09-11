<?php

namespace App\Repositories\Contracts;

interface RoadRepositoryInterface
{
    public function withLatestProgression();
    public function findByStatus($status);
    public function isDoneWithName($name);
    public function planningBudget();
    public function contractCost();
    public function contractDoneCost();
}
