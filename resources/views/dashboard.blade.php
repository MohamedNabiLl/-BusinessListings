@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard <span class="float-right"><a href="/listings/create" class="btn btn-primary btn-xs">Add Listing </a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Your Listings</h3>

                            <table class="table table-striped">
                                <tr>
                                    <th>Company</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($listings as $listing)
                                    <tr>
                                        <td>{{$listing->name}}</td>
                                        <td><a href="/listings/{{$listing->id}}/edit" class="btn btn-danger">Edit</a></td>
                                        <td>
                                            {{ Form::open(['action' => ['ListingController@destroy' ,$listing->id], 'method' => 'POST','class'=>"pull-left",'onsubmit'=>'return confirm("are you sure ?")'])}}
                                            {{ Form::hidden('_method','DELETE')}}
                                            {{ Form::bsSubmit('Delete ',['class' => 'btn btn-primary'])}}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                    @endforeach
                            </table>



                </div>
            </div>
        </div>
    </div>

@endsection
