@extends('admin.adminShow')

@section('title')
    Admin page single
@endsection

@section('content')
    <div class="container">
        <table class ="table">
            <thead>
            <tr>
                @foreach($single as $key => $value)
                    <th>{{$key}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($single as $key => $record)

                <td>{{$record}}</td>
             @endforeach
           </tr>
            </tbody>
        </table>
    </div>
@endsection