<?php 

namespace App\Services\Employee;

use App\Helpers\ResponseHelper;
use App\Models\JobEmployModel;
use Exception;

class PostService
{
    public function store(array $data)
    {
        try {
            JobEmployModel::create($data);
            return ResponseHelper::success(__('created successfully'));
        } catch (Exception $e) {
            return ResponseHelper::error($e->getMessage(), $e->getTrace());
        }
    }
}

