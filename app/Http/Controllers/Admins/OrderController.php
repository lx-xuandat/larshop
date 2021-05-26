<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * @var Order $orderService
     */
    protected $orderService;

    public function __construct(Order $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Get list Order
     */
    public function get(Request $request, Order $order)
    {
        $data = $this->orderService->getData();
        return DataTables::of($data)
            ->addColumn('Actions', function ($data) {
                return '<button type="button" class="btn btn-success btn-sm btn-edit" data-id="' . $data->id . '">Edit</button>
                    <button type="button" data-id="' . $data->id . '" class="btn btn-danger btn-sm btn-delete">Delete</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.orders');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $data = Order::create($request->all());

            return response()->json([
                'order' => $data,
                'status_code' => '201',
                'message' => 'Create Success!',
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'status_code' => '500',
                'message' => 'Create Fail',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $model = Order::find($id);

        if ($model) {
            return response()->json([
                'model' => $model,
                'status_code' => '200',
                'message' => 'success',

            ]);
        }

        return response()->json([
            'status_code' => 404,
            'message' => 'fail',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $model = Order::find($id);

        if (!$model) {
            return response()->json([
                'message' => 'Order not found',
                'status_code' => 404,
            ]);
        }

        try {
            $model->address = $request->address;
            $model->total_price = $request->total_price;
            $model->status = $request->status;

            $model->save();

            return response()->json([
                'status_code' => 203,
                'message' => 'Update Success!',
                'model' => $model,
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status_code' => 500,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $model = Order::destroy($id);
            if ($model == 1) {
                return response()->json([
                    'status_code' => 204,
                    'message' => 'delete success',
                ]);
            }
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Delete Fail',
                'status_code' => 500,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
