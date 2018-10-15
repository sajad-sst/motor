@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">WellCome to Admin Page</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <h5>Register a motorbike</h5>
                            <form action="{{route('motor-store')}}" method="post" enctype="multipart/form-data">
                                <input type="text" name="last_make" placeholder="Least make">
                                <input type="text" name="model" placeholder="model">
                                <input type="text" name="color" placeholder="color">
                                <input type="number" name="weight" placeholder="weight">
                                <input type="number" name="price" placeholder="price">

                                <div>
                                    <a class="file-btn">add img</a>
                                </div>
                                <div class="file">
                                    <input type="file" name="img[]">
                                </div>

                                <div><button type="submit">Register</button> </div>
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
