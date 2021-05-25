<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customers');
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
        // dd($request->all());
        try {
            $customer = Customer::create($request->all());

            return response()->json([
                'customer' => $customer,
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
        $customer = Customer::find($id);

        if ($customer) {
            return response()->json([
                'customer' => $customer,
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
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json([
                'message' => 'Customer not found',
                'status_code' => 404,
            ]);
        }

        try {
            $customer->lastname = $request->lastname;
            $customer->firstname = $request->firstname;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->password = $request->password;
            $customer->address = $request->address;
            $customer->ward_street = $request->ward_street;
            $customer->district = $request->district;
            $customer->province = $request->province;

            $customer->save();

            return response()->json([
                'status_code' => 203,
                'message' => 'Update Success!',
                'customer' => $customer,
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
        try {
            $customer = Customer::destroy($id);
            if ($customer == 1) {
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

    public function getCustomers(Request $request, Customer $customer)
    {
        $data = $customer->getData();
        return DataTables::of($data)
            ->addColumn('Actions', function ($data) {
                return '<button type="button" class="btn btn-success btn-sm btn-edit" data-id="' . $data->id . '">Edit</button>
                    <button type="button" data-id="' . $data->id . '" class="btn btn-danger btn-sm btn-delete">Delete</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }
}
