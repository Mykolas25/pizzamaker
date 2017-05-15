@extends('admin.adminShow')

@section('title')
    Admin ingredients page
@endsection
{{--{{dd($list)}}--}}
@section('content')
    <div class="container">

{{--Create ingredients--}}

        <div style="margin:30px">

            @if(isset ($idForCreateMsg))
                <div style="background: hotpink; width:300px; font-size: 20px;margin:20px;padding:5px; float:right">Irasas "{{$idForCreateMsg}}" sukurtas sekmingai!!! </div>
            @endif

            {!! Form::open(['url' => route('app.ingredients.create')]) !!}

            {!! Form::label('ingredient', 'Ingredient') !!}

            {!! Form::text('name') !!}

            {!! Form::label('calories', 'Calories') !!}

            {!! Form::text('calories') !!}

            {!!  Form::submit('Click Me!')!!}

            {!! Form::close() !!}

        </div>

{{--Display list of all available ingredients--}}

        <table class ="table">
            <thead>
                <tr>
                    @foreach($list['0'] as $key => $value)
                        <th>{{$key}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($list as $key => $record)
                    <tr>@foreach($record as $key => $value)

                        <td>{{$value}}</td>

                        @endforeach

                        <td><a href="{{route($routeId, $record['id'])}}"><button>View</button></a></td>
                        <td><button onclick=deleteItem('{{route($routeId, $record['id'])}}')>Delete</button></td>
                        <td><a href="{{route($edit, $record['id'])}}")><button>Edit</button></a></td>

                    </tr>@endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

{{--JavaScript for deleting records--}}

        $.ajaxSetup ({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function deleteItem(route) {
            $.ajax({
                url: route,
                type: 'DELETE',
                dataType: 'json',
                success: function () {
                    alert('DELETED');
                },
                error: function () {
                    alert('ERROR');
                }
            });
        }
    </script>
@endsection