<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;

class DishEloquentRepository extends EloquentRepository implements DishRepositoryInterface
{
    public function getModel()
    {
        return \App\Dish::class;
    }

    public function topListDish()
    {
        $result = $this->_model::whereNotNull('id')
            ->orderBy('like_number', 'desc')
            ->take(config('const.home_lists'))
            ->get();

        return $result;
    }

    public function newListDish()
    {
        $result = $this->_model::whereNotNull('id')
            ->orderBy('created_at', 'desc')
            ->take(config('const.home_lists'))
            ->get();

        return $result;
    }

}
