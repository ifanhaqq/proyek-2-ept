@extends('layouts.start-test-layout2')

@section('content')
    <div class="d-flex justify-content-center">
        <img src="{{ asset('img/sections-partition.gif') }}" alt="" style="margin-top: 30vh">
    </div>

    <form action="{{ route('sections-handler') }}" method="post" id="handlerForm">
        @csrf
        <input type="hidden" name="section" value="{{ $section }}">
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/guide.js') }}"></script>

    <script>
        $(document).ready(function () {
            setTimeout(() => {
                $('#handlerForm').submit()
            }, 3000);
        })
    </script>
@endsection
