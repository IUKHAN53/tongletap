@extends('layouts.admin')
@section('page-title')
    {{__('HR Checklist')}}
@endsection

@section('content')
    <style>
        .file-preview {
            border: 1px solid #ccc;
            padding: 16px;
            margin-bottom: 20px;
        }

        .file-title {
            margin-top: 0;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .file-container {
            height: 400px;
            overflow: hidden;
        }

        .file-embed, .file-iframe {
            width: 100%;
            height: 100%;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: blue;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

    </style>
    <div class="container">
        <div class="row">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>File Type</th>
                        <th>Download</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $file)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ pathinfo($file)['basename'] }}</td>
                            <td>{{pathinfo($file)['extension']}}</td>
                            <td>
                                <a href="{{ asset('hr_checklists/' . pathinfo($file)['basename']) }}" download class="btn"
                                   style="background: linear-gradient(135deg, #FD7E30 0%, #FDBF18 77.08%) !important; box-shadow: 0px 6px 12px 0px rgba(253, 126, 48, 0.40) !important">Download</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
{{--            @foreach($files as $file)--}}
{{--                <div class="col-md-6 file-preview">--}}
{{--                    <h3 class="file-title">{{ pathinfo($file)['basename'] }}</h3>--}}
{{--                    <div class="file-container">--}}
{{--                        @if(pathinfo($file)['extension'] === 'pdf')--}}
{{--                            <embed src="{{ asset('hr_checklists/' . pathinfo($file)['basename']) }}"--}}
{{--                                   type="application/pdf" class="file-embed"></embed>--}}
{{--                        @elseif(pathinfo($file)['extension'] === 'docx')--}}
{{--                            <iframe src="{{ asset(str_replace(public_path(), '', $htmlFiles[pathinfo($file)['filename']])) }}"--}}
{{--                                    class="file-iframe"></iframe>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <a href="{{ asset('hr_checklists/' . pathinfo($file)['basename']) }}" download--}}
{{--                       class="btn btn-primary mt-2">Download</a>--}}
{{--                </div>--}}
{{--            @endforeach--}}
        </div>
    </div>
@endsection
