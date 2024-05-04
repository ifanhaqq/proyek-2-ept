@extends('layouts.admin-layout')

@section('content')
    <div class="col-9">
        <div class=" row  mt-4">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <div class="">
                    <div class="card-body">
                        <h4 class="font-2">MANAGE TEST</h4>
                        <div class="container rounded border mt-4">
                            <table class="table table-striped ps-2">
                                <thead>
                                    <tr class="font-2 text-center">
                                        <th scope="col" style="width: 350px">Token</th>
                                        <th scope="col" style="width: 350px">Test Title</th>
                                        <th scope="col" style="width: 350px">Description</th>
                                        <th scope="col" style="width: 350px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testWaves as $testWave)
                                        <tr>
                                            <th scope="row">{{ $testWave['token'] }}</th>
                                            <td>{{ $testWave['title'] }}</td>
                                            <td>{{ $testWave['description'] }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-6 text-center">
                                                        <a href="{{ route('manage-wave', $testWave['wave_id']) }}"><button
                                                                class="btn btn-sm btn-primary">Manage</button></a>
                                                    </div>

                                                    <div class="col-6 text-center">
                                                        <form action="{{ route('delete-wave') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="wave_id"
                                                                value="{{ $testWave['wave_id'] }}">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </div>

                                                </div>

                                            </td>
                                        </tr>
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
