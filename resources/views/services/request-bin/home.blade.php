@extends('layouts.app')

@section('content')
<request-bin shortcode="{{$bin->shortcode}}" created-at="{{$bin->created_at->format('c')}}" is-admin="{{$adminMode}}"></request-bin>
@endsection
