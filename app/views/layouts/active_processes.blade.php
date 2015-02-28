@if(isset($no_processes) && !$no_processes){{count(\eHIF\ActivitiEndpoint::tasks())}}@endif
@if(!isset($no_processes)){{count(\eHIF\ActivitiEndpoint::tasks())}} @endif