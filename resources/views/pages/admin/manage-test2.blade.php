@extends('layouts.admin-layout')

@section('content')
    <div class="col-9 mt-2">
        <div class="container overflow-hidden ">
            <div class="row">
                <h4 class="font-2">Manage Test</h4>
                <p class="sub-font">Add your Question!</p>
            </div>
            <div class="row ">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title ">Test Information</h5>
                            <form class="form-container rounded-3  fw-smaller" style="font-size:0.9vw" method="POST"
                                action="{{ route('update-wave') }}">
                                @csrf
                                <input type="hidden" name="wave_id" value="{{ $waveInfos->wave_id }}">
                                <label for="token" class="form-label ">TOKEN</label>
                                <input type="text" class="form-control fw-smaller " id="token" name="token"
                                    value="{{ $waveInfos->token }}">

                                <label for="test-name" class="form-label">Test Name</label>
                                <input type="text" class="form-control " id="" name="title"
                                    value="{{ $waveInfos->title }}">

                                <label for="description" class="form-label ">Description</label>
                                <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>

                                <button type="submit" href="" class="btn btn-success text-end mt-5">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-4">
                                    <h5 class="card-title font-2 ">Test Questions </h5>
                                </div>
                                <div class="col-4">
                                    <label for="" class="font-2">Choose Section: </label>
                                    <select  class="btn btn-outline-dark font-white" id="section" >
                                        <option value="listening" selected>Listening</option>
                                        <option value="reading">Reading</option>
                                        <option value="grammar">Grammar</option>
                                      </select>
                                </div>
                                <div class="col-4 text-end">
                                    <a href="" class="btn btn-outline-success" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">Export Here!</a>
                                    <a href="" class="btn btn-sm btn-primary bi bi-plus sub-font "
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">Add</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table-borderless " style="overflow-x:auto;">
                                    <thead>
                                        <th>Question List</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($listeningQuestions as $qs)
                                            @php $number++ @endphp
                                            <td>
                                                <tr>
                                                    <td>{{ $number }}. (Listening)</td>
                                                    <th><a href="" class="btn btn-sm btn-primary mb-1"
                                                            data-bs-toggle="modal" data-bs-target="#updateModal">Update</a>
                                                    </th>
                                                    <th><a href="" class="btn btn-sm btn-danger mb-1"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>A. {{ $qs['question_ch1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>B. {{ $qs['question_ch2'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>C. {{ $qs['question_ch3'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>D. {{ $qs['question_ch4'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="answer-font fw-smaller">Correct Answer:
                                                        {{ $qs['correct_answer'] }}</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <hr class="solid">
                                                    </td>
                                                </tr>
                                            </td>
                                        @endforeach

                                        @foreach ($grammarQuestions as $qs)
                                            @php $number++ @endphp
                                            <td>
                                                <tr>
                                                    <td>{{ $number }}. {{ $qs['question'] }} (Structure & Written
                                                        Expression)</td>
                                                    <th><a href="" class="btn btn-sm btn-primary mb-1"
                                                            data-bs-toggle="modal" data-bs-target="#updateModal">Update</a>
                                                    </th>
                                                    <th><a href="" class="btn btn-sm btn-danger mb-1"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>A. {{ $qs['question_ch1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>B. {{ $qs['question_ch2'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>C. {{ $qs['question_ch3'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>D. {{ $qs['question_ch4'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="answer-font fw-smaller">Correct Answer:
                                                        {{ $qs['correct_answer'] }}</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <hr class="solid">
                                                    </td>
                                                </tr>
                                            </td>
                                        @endforeach

                                        @foreach ($grammarQuestions as $qs)
                                            @php $number++ @endphp
                                            <td>
                                                <tr>
                                                    <td>{{ $number }}. {{ $qs['question'] }} (Structure & Written
                                                        Expression)</td>
                                                    <th><a href="" class="btn btn-sm btn-primary mb-1"
                                                            data-bs-toggle="modal" data-bs-target="#updateModal">Update</a>
                                                    </th>
                                                    <th><a href="" class="btn btn-sm btn-danger mb-1"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>A. {{ $qs['question_ch1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>B. {{ $qs['question_ch2'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>C. {{ $qs['question_ch3'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>D. {{ $qs['question_ch4'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="answer-font fw-smaller">Correct Answer:
                                                        {{ $qs['correct_answer'] }}</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <hr class="solid">
                                                    </td>
                                                </tr>
                                            </td>
                                        @endforeach

                                        @foreach ($readingQuestions as $qs)
                                            @php $number++ @endphp
                                            <td>
                                                <tr>
                                                    <td>{{ $number }}. {{ $qs['question'] }} (Reading)</td>
                                                    <th><a href="" class="btn btn-sm btn-primary mb-1"
                                                            data-bs-toggle="modal" data-bs-target="#updateModal">Update</a>
                                                    </th>
                                                    <th><a href="" class="btn btn-sm btn-danger mb-1"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>A. {{ $qs['question_ch1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>B. {{ $qs['question_ch2'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>C. {{ $qs['question_ch3'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>D. {{ $qs['question_ch4'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="answer-font fw-smaller">Correct Answer:
                                                        {{ $qs['correct_answer'] }}</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <hr class="solid">
                                                    </td>
                                                </tr>
                                            </td>
                                        @endforeach
                                    </tbody>

                                </table>

                            </div>


                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


    {{-- penutup untuk nav --}}
    </div>
    </div>

    {{-- modal add que --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 font-2" id="exampleModal">Add Test Question</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body sub-font">
                    <form class="form-container rounded-3 fw-smaller" method="POST"
                        action="{{ route('store-question') }}">
                        @csrf
                        <label class="font-2" for="">Choose Section</label>
                        <select class="btn btn-outline-dark" name="" id="">
                            <option value="listening">1. Listening</option>
                            <option value="greammar">2. Grammar</option>
                            <option value="reading">3. Reading</option>
                        </select><br>
                        <label for="token" class="form-label fw-bolder">Question</label>
                        <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="" class="fw-bolder">Option</label><br>
                        <label for="test-name" class="form-label">A. </label>
                        <input type="text" class="form-control " id="" name="choice_1">

                        <label for="test-name" class="form-label">B. </label>
                        <input type="text" class="form-control " id="" name="choice_2">

                        <label for="test-name" class="form-label">C. </label>
                        <input type="text" class="form-control " id="" name="choice_3">

                        <label for="test-name" class="form-label">D. </label>
                        <input type="text" class="form-control " id="" name="choice_4">

                        <label for="test-name" class="form-label answer-font">Answer: </label>
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example">
                            <option selected>Open this select answer</option>

                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning font-2">Add</button>
                </div>

            </div>
        </div>
    </div>


    {{-- modal update questions --}}
    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 font-2" id="updateModal">Update Question</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body sub-font">
                    <form class="form-container rounded-3 fw-smaller" method="POST" action="">
                        <label for="disabledSelect" class="form-label">Disabled select menu</label>
                        <select id="disabledSelect" class="form-select">
                        </select>
                        <label for="token" class="form-label fw-bolder ">Question</label>
                        <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="" class="fw-bolder">Option</label><br>
                        <label for="test-name" class="form-label">A. </label>
                        <input type="text" class="form-control " id="" name="">

                        <label for="test-name" class="form-label">B. </label>
                        <input type="text" class="form-control " id="" name="">

                        <label for="test-name" class="form-label">C. </label>
                        <input type="text" class="form-control " id="" name="">

                        <label for="test-name" class="form-label">D. </label>
                        <input type="text" class="form-control " id="" name="">

                        <label for="test-name" class="form-label answer-font">Answer: </label>
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example">
                            <option selected>Open this select answer</option>

                            <option value="">A</option>
                            <option value="">B</option>
                            <option value="">C</option>
                            <option value="">D</option>
                        </select>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary font-2">Update</button>
                </div>

            </div>
        </div>
    </div>
    {{-- modal import file --}}

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Eksport file</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Select file that contain question:</h3>
                    <form action="/action_page.php">
                        {{-- download excel template file  --}}
                        <p>files must be based on a template, click download if didn't have any!</p>
                        <a href="../img/cover.png" class="btn btn-sm btn-success mb-3" download>Download </a>
                        <br>
                        <label for="myfile">Upload File</label>
                        <input type="file" id="myfile" name="myfile"><br><br>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
