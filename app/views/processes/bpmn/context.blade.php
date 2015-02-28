@if(isset($patient))

    <h4><a target="_blank" href="{{URL::to('patients/'.$patient->id)}}">{{$patient->onomatepwnimo}}</a></h4>
    <h5>{{$patient->amka}}</h5>

@endif