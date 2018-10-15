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

                        <div class="row">
                            <div class = "col-md-6">
                                <form action="{{route('sort')}}" method="post">
                                    <div class="col-md-12">
                                        <input name="sort" type="radio" value="price" checked> Sort By Price<br>
                                        <input name="sort" type="radio" value="date"> Sort By Date
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-default">Sort</button>
                                    </div>
                                    {{csrf_field()}}
                                </form>
                            </div>
                            <div class = "col-md-6">
                                <form action="{{route('sort')}}" method="post">
                                    <div class="col-md-12">
                                        <input name="sort" type="radio" value="price" checked> Sort By Price<br>
                                        <input name="sort" type="radio" value="date"> Sort By Date
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-default">Sort</button>
                                    </div>
                                    {{csrf_field()}}
                                </form>
                            </div>
                        </div>
                        <div>
                            <table>
                                <tr>
                                    <th>ID</th>
                                    <th>last_make</th>
                                    <th>modell</th>
                                    <th>color</th>
                                    <th>weight</th>
                                    <th>price</th>
                                    <th>Date</th>
                                    <th>options</th>
                                </tr>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->last_make}}</td>
                                        <td>{{$item->modell}}</td>
                                        <td>{{$item->color}}</td>
                                        <td>{{$item->weight}} KG</td>
                                        <td>{{$item->price}} $</td>
                                        <td>{{$item->created_at}}</td>
                                        <td><a href="{{route('detail',$item->id)}}" class="btn btn-info">detail</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
