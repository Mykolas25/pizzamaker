@extends('admin.adminShow')

@section('title')
    Admin page edit
@endsection
{{--{{dd($single)}}--}}
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

{{--<div style="height:500px; width: 1000px; border: 2px black solid; margin:auto; margin-top: 20px; padding: 20px">--}}

    <tr>
    {!! Form::open(['class' => 'table', 'url' => route('app.ingredients.edit', $single['id'])]) !!}

        <td>{!! Form::label('count', 'Count') !!}
            {!! Form::text('count', $single['count']) !!}
        </td>

        <td>{!! Form::label('id', 'Id') !!}
            {!! Form::text('id', $single['id']) !!}
        </td>

        <td>
            {{--{!! Form::label('created_at', 'Created_at') !!}--}}
            {{--{!! Form::text('created_at', $single['created_at']) !!}--}}
        </td>

        <td></td>

        <td>
            {{--{!! Form::label('updated_at', 'Updated_at') !!}--}}
            {{--{!! Form::text('updated_at', $single['updated_at']) !!}--}}
        </td>
        </td>

        <td>{!! Form::label('ingredient', 'Name') !!}
            {!! Form::text('ingredient', $single['name']) !!}
        </td>

        <td>{!! Form::label('calories', 'Calories') !!}
            {!! Form::text('calories', $single['calories']) !!}
        </td>

        <td>{!!  Form::submit('Click Me!')!!}
            {!! Form::close() !!}
        </td>
    </tr>
</table>
    </div>
{{--<div>--}}
    <a href="{{route('app.ingredients.index')}}"><button>Return to list</button></a>
@endsection

