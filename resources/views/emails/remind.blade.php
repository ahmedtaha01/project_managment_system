
@component('mail::message')
# You have unfinished task , {{ $data->name }} 

hurry up the deadline is close , {{ $data->deadline }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/project/task/'.$data->id ,'color' => 'success'])
Go To Task
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
