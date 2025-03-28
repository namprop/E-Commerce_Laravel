<?php

namespace App\Repositories\OrderDetail;

use App\Repositories\BaseRepository;

use App\Models\OrderDetail;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
    public function getModel()
    {
        return OrderDetail::class;
    }
}
