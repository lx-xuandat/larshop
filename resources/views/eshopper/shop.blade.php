@extends('eshopper.master')

@section('advertisement')
    @include('eshopper.inc.advertisement')
@endsection

@section('features_items')
    @include('eshopper.inc.features_items',[
        'pagination'=>true,
        'products'=> $products ?? [] ,
    ])
@endsection
