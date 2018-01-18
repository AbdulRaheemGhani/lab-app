@foreach($doctors as $doctor)
<tr class="tr">
    <td>{{ $doctor->id }}</td>
    <td>{{ $doctor->name }}</td>
    <td>{{ $doctor->percentage }}</td>
    <td style="width:145px;padding:0px;">
        <a href="/laboratory/doctors/{{ $doctor->id }}">
                                            
            <button class="btn btn-default" id="btnView" >View Record</button>

        </a>

        <a href="/laboratory/doctors/{{ $doctor->id }}/edit">

            <button class="btn btn-primary" id="btnEdit" ><i class="fa fa-edit"></i></button>
        </a>

    </td>

    <td style="text-align: left;padding:0px;">
    {!! Form::open(['route' => ['doctors.destroy', $doctor->id], 'method' => 'DELETE']) !!}

    {{Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'])}}

    {!! Form::close() !!}
    </td>
</tr>
@endforeach