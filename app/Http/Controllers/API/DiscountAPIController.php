<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDiscountAPIRequest;
use App\Http\Requests\API\UpdateDiscountAPIRequest;
use App\Http\Resources\DiscountResource;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

/**
 * Class DiscountAPIController
 * @package App\Http\Controllers\API
 */
class DiscountAPIController extends Controller
{
    /**
     * Display a listing of the Discount.
     * GET|HEAD /discounts
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = Discount::query();

        if ($request->has('skip')) {
            $query->skip($request->get('skip'));
        }

        if ($request->has('limit')) {
            $query->limit($request->get('limit'));
        }

        $discounts = $query->get();

<<<<<<< Updated upstream
        return response()->json(DiscountResource::collection($discounts));
    }
=======
        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => DiscountResource::collection($discounts)
        ]);
    }

>>>>>>> Stashed changes

    /**
     * Display the specified Discount.
     * GET|HEAD /discounts/{$discount}
     *
     * @param \App\Models\Discount $discount
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(Discount $discount)
    {
<<<<<<< Updated upstream
        return response()->json(new DiscountResource($discount));
    }
}
=======
        $discount = Discount::find($id);

        if (empty($discount)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => new DiscountResource($discount)
        ]);
    }
}
>>>>>>> Stashed changes
