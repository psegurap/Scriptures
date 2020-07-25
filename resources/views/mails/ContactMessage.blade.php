<h3>{{__('User information')}}:</h3>
<ul>
    <li><strong>{{__('Name')}}:</strong> {{$data->name}}</li>
    <li><strong>{{__('Email')}}:</strong> {{$data->email}}</li>
    <li><strong>{{__('Subject')}}:</strong> {{$data->subject}}</li>
</ul>

<h3>{{__('Message')}}:</h3>
<pre style="margin:0px">
<p style="font-size: 16px; text-align: justify; margin:0px">
{{$data->message}}
</p>
</pre>
