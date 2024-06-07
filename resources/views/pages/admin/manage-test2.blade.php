@extends('layouts.admin-layout')

@section('content')
    <div class="col-9 mt-2">
        <div class="container overflow-hidden ">
            <div class="row">
                <h4 class="font-2">Manage Test</h4>
                <p class="sub-font">Add your Question!</p>
            </div>
            @if (session('success-update'))
                <div class="alert alert-success alert-dismissable d-flex flex-row" role="alert">
                    <div class="me-auto">{{ session('success-update') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
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
                                    value="{{ $waveInfos->token }}" readonly>

                                <label for="test-name" class="form-label">Test Name</label>
                                <input type="text" class="form-control " id="" name="title"
                                    value="{{ $waveInfos->title }}">

                                <label for="description" class="form-label ">Description</label>
                                <textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="description">{{ $waveInfos->description }}</textarea>
                                {{-- new feature --}}
                                <div class="row font-2 mt-3">
                                    <div class="col-3">
                                        <h6>Total Questions </h6>
                                        <p>Listening </p>
                                        <p>Structure And Written Expression </p>
                                        <p>Reaading </p>
                                    </div>
                                    <div class="col-2">
                                        <p>: {{ count($listeningQuestions) + count($grammarQuestions) + count($readingQuestions) }}
                                        </p>
                                        <p>: {{ count($listeningQuestions) }}</p>
                                        <p>: {{ count($grammarQuestions) }}</p>
                                        <p>: {{ count($readingQuestions) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex col-7">
                                    <button type="submit" href=""
                                        class="btn btn-success text-end mt-5">Save</button>
                                    <a href="{{ route('listening-preview', $waveInfos->wave_id) }}"
                                        class="btn btn-primary mt-5 ms-auto">Test preview</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            {{-- add guide --}}
            <div class="card mt-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h5 class="card-title font-2  ">Test Guide </h5>
                        </div>
                        <div class="col-6">
                            <label for="" class="font-2">Choose Section: </label>
                            <select class="btn btn-outline-dark font-white">
                                <option value="1">Listening</option>
                                <option value="2">Structure & Written Expression</option>
                                <option value="3">Reading</option>
                            </select>
                        </div>
                        <div class="col-3 text-end">

                            <button class="btn btn-sm btn-dark bi bi-plus sub-font " data-bs-toggle="modal"
                                data-bs-target="#modalGuide">Add</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table>
                            <tr>
                                <td>
                                    "
Radiocarbon dating and tree-ring dating, in combination, have provided a very powerful tool to establish a time spectrum for more recent dates in the
past. The initial idea for dating by tree rings can be traced back to 1811. Modern scientific tree-ring dating, dendrochronology, stems from pioneering work in early 1900’s.
Usually, but not always, trees produce one ring each year. This ring is formed by the cambium, which lies between the old wood and the bark. In spring, wood cells with large lumens are manufactured, but in summer and autumn, the cells become smaller and more thick-walled until with the onset of winter the production of a new cell stops. The same process is repeated the following year. In this way a year’s growth (annual ring) is imprinted as new wood. The demarcation line between summer and autumn wood of the previous year, with its characteristic small cells, and the spring wood of the year following, with its large cells, enables annual rings to be counted relatively easily.
Growth rings, however, are not always the same thickness. They vary for several reasons. Environmental factors rigidly control the degree of growth of an annual ring or determine whether, in fact, an annual ring appears at all in any particular year. Thus in a specific locale or, more accurately, a specific climatic province, tree-ring counts will reflect climatic conditions and variations due to inequalities of climate from year to year. In years with abnormal drought, for example, narrow rings are produced and sometimes no ring at all. In this way a fossil record is imprinted for as long as the wood remains intact. From this pattern a historical template can be constructed to correlate one set of growth rings in one tree with a set of growth rings in another tree or piece of timber.
Another important factor is that tree-ring growth varies with age of the tree. As the tree matures, the rings become narrower, and this results in the central rings being wider than those on the outer part of the tree."					

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 mt-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissable d-flex flex-row" role="alert">
                            <div class="me-auto">{{ session('success') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-3">
                                    <h5 class="card-title font-2 ">Test Questions </h5>
                                </div>
                                <div class="col-6">
                                    <label for="" class="font-2">Choose Section: </label>
                                    <select class="btn btn-outline-dark font-white" id="sectionSelect">
                                        <option value="1">Listening</option>
                                        <option value="2">Structure & Written Expression</option>
                                        <option value="3">Reading</option>
                                    </select>
                                </div>
                                <div class="col-3 text-end">
                                    <button class="btn btn-outline-success" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">Export Here!</button>
                                    <button class="btn btn-sm btn-primary bi bi-plus sub-font " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Add</button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            @if ($audioFile !== null)
                                <div class="text-center mt-4 mb-3" id="audioPlayer">
                                    <audio controls src="{{ asset("storage/audio/{$audioFile->audio_title}") }}"></audio>
                                </div>
                            @endif

                            <div class="row">
                                <table class="table-borderless " style="overflow-x:auto;">
                                    <thead>
                                        <tr>
                                            <th>Question List</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sections">
                                        @foreach ($listeningQuestions as $qs)
                                            @php $number++ @endphp
                                            <tr class="mb-3 section-1">
                                                <td>
                                                    {{ $number }}.<br>
                                                    A. {{ $qs['question_ch1'] }}<br>
                                                    B. {{ $qs['question_ch2'] }}<br>
                                                    C. {{ $qs['question_ch3'] }}<br>
                                                    D. {{ $qs['question_ch4'] }}<br>
                                                    <div class="answer-font fw-smaller">
                                                        Correct Answer:
                                                        {{ $qs['correct_answer'] }}
                                                    </div><br>
                                                </td>
                                                <td class="align-top text-start">
                                                    <button href=""
                                                        class="btn btn-sm btn-primary mb-1 update-question-listening"
                                                        data-bs-toggle="modal" data-bs-target="#updateModal"
                                                        data-id="{{ $qs['question_id'] }}">Update</button>
                                                    <form action="{{ route('delete-question') }}" method="POST"
                                                        id="delete-question-{{ $qs['question_id'] }}">
                                                        @csrf
                                                        <input type="hidden" name="question_id"
                                                            value="{{ $qs['question_id'] }}">
                                                        <input type="hidden" name="wave_id"
                                                            value="{{ $waveInfos->wave_id }}">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger mb-1 delete-button-question"
                                                            data-id="{{ $qs['question_id'] }}">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @php $number = 0 @endphp
                                        @foreach ($grammarQuestions as $qs)
                                            @php $number++ @endphp
                                            <tr class="mb-3 section-2">
                                                <td>
                                                    {{ $number }}. {{ $qs['question'] }}<br>
                                                    A. {{ $qs['question_ch1'] }}<br>
                                                    B. {{ $qs['question_ch2'] }}<br>
                                                    C. {{ $qs['question_ch3'] }}<br>
                                                    D. {{ $qs['question_ch4'] }}<br>
                                                    <div class="answer-font fw-smaller">
                                                        Correct Answer:
                                                        {{ $qs['correct_answer'] }}
                                                    </div><br>
                                                </td>
                                                <td class="align-top text-start">
                                                    <button href=""
                                                        class="btn btn-sm btn-primary mb-1 update-question-grammar"
                                                        data-bs-toggle="modal" data-bs-target="#updateModal"
                                                        data-id="{{ $qs['question_id'] }}">Update</button>
                                                    <form action="{{ route('delete-question') }}" method="POST"
                                                        id="delete-question-{{ $qs['question_id'] }}">
                                                        @csrf
                                                        <input type="hidden" name="question_id"
                                                            value="{{ $qs['question_id'] }}">
                                                        <input type="hidden" name="wave_id"
                                                            value="{{ $waveInfos->wave_id }}">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger mb-1 delete-button-question"
                                                            data-id="{{ $qs['question_id'] }}">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @php $number = 0 @endphp

                                        {{-- Reading Section --}}
                                        <input type="hidden" id="amountOfReading"
                                            value="{{ count($readingQuestions) }}">
                                        @foreach ($readingQuestions as $qs)
                                            @php $number++ @endphp
                                            <tr class="mb-3 section-3">
                                                <td>
                                                    <p class="reading_text_{{ $qs['reading_id'] }}">{{ $qs['text'] }}
                                                    </p>
                                                    {{ $number }}. {{ $qs['question'] }}<br>
                                                    A. {{ $qs['question_ch1'] }}<br>
                                                    B. {{ $qs['question_ch2'] }}<br>
                                                    C. {{ $qs['question_ch3'] }}<br>
                                                    D. {{ $qs['question_ch4'] }}<br>
                                                    <div class="answer-font fw-smaller">
                                                        Correct Answer:
                                                        {{ $qs['correct_answer'] }}
                                                    </div><br>
                                                </td>
                                                <td class="align-top text-start">
                                                    <button href=""
                                                        class="btn btn-sm btn-primary mb-1 update-question-reading"
                                                        data-bs-toggle="modal" data-bs-target="#updateModal"
                                                        data-id="{{ $qs['question_id'] }}"
                                                        data-reading="{{ $qs['reading_id'] }}">Update</button>
                                                    <form action="{{ route('delete-question') }}" method="POST"
                                                        id="delete-question-{{ $qs['question_id'] }}">
                                                        @csrf
                                                        <input type="hidden" name="question_id"
                                                            value="{{ $qs['question_id'] }}">
                                                        <input type="hidden" name="wave_id"
                                                            value="{{ $waveInfos->wave_id }}">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger mb-1 delete-button-question"
                                                            data-id="{{ $qs['question_id'] }}">Delete</button>
                                                    </form>
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
    </div>

    </div>


    {{-- penutup untuk nav --}}
    </div>
    </div>
    {{-- modal add guide --}}
    <div class="modal fade" id="modalGuide" tabindex="-1" aria-labelledby="modalGuide" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 font-2" id="modalGuide">Add Test Question</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body sub-font">
                    <form class="form-container rounded-3 fw-smaller" method="POST">
                       
                        <input type="hidden" name="" >
                        <label class="font-2" for="">Choose Section</label>
                        <select class="btn btn-outline-dark mb-3" name="" id=" ">
                            <option value="listening">Listening</option>
                            <option value="grammar">Structure & Written Expression</option>
                            <option value="reading">Reading</option>
                        </select><br>
                        <label for="" class="font-2">Guide Text</label> <br>
                        <textarea rows="10" class="form-control" placeholder="Write down here..." id="floatingTextarea2" style="height: 55vh">mjjdhsf </textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning font-2">Add</button>
                    </form>
                </div>

            </div>
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
                        <input type="hidden" name="wave_id" value="{{ $waveInfos->wave_id }}">
                        <label class="font-2" for="">Choose Section</label>
                        <select class="btn btn-outline-dark mb-3" name="addQuestionSection" id="addQuestionSection">
                            <option value="listening">Listening</option>
                            <option value="grammar">Structure & Written Expression</option>
                            <option value="reading">Reading</option>
                        </select><br>

                        {{-- Optional option for reading section only --}}
                        <label for="readingTextQuestion" class="form-label fw-bolder readingTextQuestion">Text</label>
                        <textarea name="readingTextQuestion" id="readingTextQuestion" class="form-control readingTextQuestion"
                            style="height: 100px" required></textarea>

                        <div id="questionsContainer">
                            <div class="questionElems">
                                <input type="hidden" id="questionElemParam" value="1" name="questionElemParam">
                                <label for="token" class="form-label fw-bolder questionInput">Question</label>
                                <textarea class="form-control questionInput" name="question" id="questionInput" style="height: 100px" required></textarea>

                                <label for="" class="fw-bolder">Option</label><br>
                                <label for="test-name" class="form-label">A. </label>
                                <input type="text" class="form-control " id="" name="choice_1" required>

                                <label for="test-name" class="form-label">B. </label>
                                <input type="text" class="form-control " id="" name="choice_2" required>

                                <label for="test-name" class="form-label">C. </label>
                                <input type="text" class="form-control " id="" name="choice_3" required>

                                <label for="test-name" class="form-label">D. </label>
                                <input type="text" class="form-control " id="" name="choice_4" required>

                                <label for="test-name" class="form-label answer-font">Answer: </label>
                                <select class="form-select form-select-lg mb-3" name="correct_answer"
                                    aria-label="Large select example">
                                    <option selected>Open this select answer</option>

                                    <option value="1">A</option>
                                    <option value="2">B</option>
                                    <option value="3">C</option>
                                    <option value="4">D</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="addNewQuestion">Add Question For This
                            Text</button>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning font-2">Add</button>
                    </form>
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
                    <form class="form-container rounded-3 fw-smaller" method="POST"
                        action="{{ route('update-question') }}">
                        @csrf
                        <input type="hidden" name="question_id" id="updating-question-id">
                        <input type="hidden" name="wave_id" id="updating-wave-id" value="{{ $waveInfos->wave_id }}">
                        <input type="hidden" name="section" id="updating-section">
                        <input type="hidden" name="reading_id" id="updating-reading-id">

                        <label for="section" class="form-label">Section</label>
                        <input class="form-control" name="section" type="text" id="updating-section-display"
                            disabled>

                        <label for="text" class="form-label fw-bolder updating-text">Text</label>
                        <textarea class="form-control updating-text" name="text" id="updating-text" style="height: 100px"></textarea>

                        <label for="question" class="form-label fw-bolder ">Question</label>
                        <textarea class="form-control" name="question" id="updating-question" style="height: 100px"></textarea>


                        <label for="" class="fw-bolder">Option</label><br>
                        <label for="test-name" class="form-label">A. </label>
                        <input type="text" class="form-control" id="updating-questionch1" name="choice_1">

                        <label for="test-name" class="form-label">B. </label>
                        <input type="text" class="form-control " id="updating-questionch2" name="choice_2">

                        <label for="test-name" class="form-label">C. </label>
                        <input type="text" class="form-control " id="updating-questionch3" name="choice_3">

                        <label for="test-name" class="form-label">D. </label>
                        <input type="text" class="form-control " id="updating-questionch4" name="choice_4">

                        <label for="test-name" class="form-label answer-font">Answer: </label>
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example"
                            name="correct_answer">
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                        </select>



                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary font-2">Update</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal export -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Export file</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Select file that contain question:</h3>
                    <form action="{{ route('import-spreadsheet', $waveInfos->wave_id) }}" method="POST"
                        class="form-container" enctype="multipart/form-data">
                        @csrf
                        {{-- download excel template file  --}}
                        <p>The file must be based on a template, click download if didn't have any!</p>
                        <a href="{{ route('download-template') }}" class="btn btn-sm btn-success mb-3" download>Download
                        </a>
                        <br>
                        <label class="form-label" for="excel">Upload File</label>
                        <input class="form-control" type="file" id="excel" name="excel"
                            accept=".xlsx, .xls"><br><br>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/admin-responses.js') }}"></script>
@endsection
