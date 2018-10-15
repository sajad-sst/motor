@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <table>
                                <tr>
                                    <th>last_make</th>
                                    <th>modell</th>
                                    <th>color</th>
                                    <th>weight</th>
                                    <th>price</th>
                                </tr>
                                <tr>
                                    <td>{{$item->last_make}}</td>
                                    <td>{{$item->modell}}</td>
                                    <td>{{$item->color}}</td>
                                    <td>{{$item->weight}} KG</td>
                                    <td>{{$item->price}} $</td>
                                </tr>
                            </table>
                        </div>

                        @php
                            $images = unserialize($item->images);
                        @endphp

                        <div class="row m-t-50">
                            @foreach($images as $image)
                                <div class="col-md-4">
                                    <a href="{{url($image)}}" target="_blank"><img src="{{url($image)}}" class="w-100"></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
