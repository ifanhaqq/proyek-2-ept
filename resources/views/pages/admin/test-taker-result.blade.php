@extends('layouts.admin-layout')

@section('content')
    <div class="col-9">
        <div class=" row  mt-4">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <div class="">
                    <div class="card-body">
                        <h4 class="font-2">Test Taker Result</h4>
                        <input id="searchInput" class="form-control me-2" type="text" placeholder="Search...">
                        <div class="container rounded border mt-4">
                            <table id="scoresTable" class="table table-striped ps-2">
                                <thead>
                                    <tr class="font-2">
                                        <th>No</th>
                                        <th scope="col" style="width: 350px">Student Name</th>
                                        <th scope="col" style="width: 350px">Test Title</th>
                                        <th scope="col" style="width: 350px">Test Date</th>
                                        <th scope="col" style="width: 350px">Scores</th>
                                        <th scope="col" style="width: 350px">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testScores as $testScore)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <th scope="row">{{ $testScore['name'] }}</th>
                                            <td>{{ $testScore['title'] }}</td>
                                            <td>{{ $testScore['test_date'] }}</td>
                                            <td>{{ $testScore['score'] }}</td>
                                            <td>
                                                <a href="{{ route('test-score', $testScore['id']) }}"
                                                    class="btn btn-sm btn-info bi bi-search"> more</a>
                                            </td>
                                        </tr>
                                        @php $number++ @endphp
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- penutup untuk nav --}}
    </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/search.js') }}"></script>
@endsection
