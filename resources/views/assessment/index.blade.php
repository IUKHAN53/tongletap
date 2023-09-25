@extends($layout)
@section('page-title')
    {{__('Assessments')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Assessments')}}</li>
@endsection

@section('content')
    <style>
        .placeholder-image {
            width: 150px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            margin: 10px;
            position: relative;
        }
    </style>
    <div>
        <div class="card d-flex  p-3 gap-3 flex-column justify-content-center align-items-center shadow">
            <svg fill="#FB9229FF" height="50" width="50" version="1.1" id="Layer_1"
                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                 xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <g>
                        <g>
                            <path d="M449.511,137.648v-82.38c0-9.072-4.668-17.227-12.487-21.814c-7.849-4.605-17.29-4.7-25.251-0.247 c-76.024,42.516-158.725,67.345-245.805,73.802c-0.667,0.049-79.372,0.393-79.372,0.393c-19.767,0-36.105,14.923-38.366,34.091 H32.075C14.39,141.493,0,155.881,0,173.567v70.468c0,17.686,14.39,32.075,32.075,32.075h16.153 c1.628,13.795,10.544,25.383,22.785,30.799l57.485,158.648c3.593,9.875,13.067,16.511,23.578,16.511h57.687 c8.178,0,15.86-3.999,20.551-10.697c4.691-6.7,5.822-15.287,3.03-22.96l-49.389-136.237 c80.482,8.361,157.039,32.601,227.817,72.183c3.905,2.184,8.166,3.273,12.42,3.273c4.417-0.001,8.83-1.175,12.829-3.521 c7.819-4.588,12.489-12.742,12.489-21.816v-82.38C484.711,275.353,512,245.204,512,208.781 C512,172.357,484.711,142.207,449.511,137.648z M47.951,251.372H32.075c-4.047,0-7.338-3.291-7.338-7.338v-70.467 c0-4.044,3.291-7.337,7.338-7.337h15.876V251.372z M80.93,284.245c-4.85-2.174-8.242-7.039-8.242-12.688V146.044h0.001 c0-7.667,6.239-13.905,13.906-13.905h67.333v153.324c0,0-67.92-0.026-68.213-0.044C83.234,285.132,82.712,285.004,80.93,284.245z M210.091,456.853c0.04,0.101,0.066,0.173-0.041,0.324c-0.105,0.151-0.183,0.151-0.288,0.151h-57.687 c-0.147,0-0.282-0.093-0.327-0.215L98.515,310.199h58.411L210.091,456.853z M424.774,362.294c0,0.179,0,0.322-0.267,0.479 c-0.318,0.184-0.508,0.079-0.66-0.006c-76.034-42.52-158.469-68.045-245.182-75.96v-156.04 c86.72-7.927,169.155-33.454,245.179-75.97c0.156-0.085,0.349-0.19,0.663-0.006c0.267,0.157,0.267,0.298,0.267,0.477V362.294z M449.511,254.873v-92.185c21.503,4.314,37.752,23.339,37.752,46.092C487.263,231.534,471.013,250.56,449.511,254.873z"></path>
                        </g>
                    </g>
                </g></svg>
            Try out our bite size modules and assessments! They are designed to guide you to increase self-awareness and
            build a positive lifestyle.
        </div>
        @foreach($assessments as $assessment)
            <div class="card d-flex p-3 shadow flex-row gap-3 justify-content-start align-items-center">
                <div class="placeholder-image rounded">
                    <img src="{{$assessment['image']}}"  class="rounded" alt="" style="position:absolute; opacity: .4">
                    <span style="color: black; z-index: 4">{{$assessment['title']}}</span>
                </div>
                <div>
                    <h3>{{$assessment['title']}}</h3>
                    <p>{{$assessment['description']}}</p>
                    <a href="{{$assessment['url']}}" style="color: #fb9229" target="_blank">View More >> </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection