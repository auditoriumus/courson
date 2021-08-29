@extends('layouts.test')

@section('content')
    @include('test_components.list')
@endsection

@section('script')
    <script>
        function select(id) {
            location = "/contacts/" + id +'/edit'
        }
    </script>
@endsection
