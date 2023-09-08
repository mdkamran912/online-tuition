@if ($type == 'student-classes' && isset($classes))
    @foreach ($classes as $class)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $class->meeting_id }}</td>
            <td>{{ $class->status }}</td>
            <td>{{ $class->subjects }}</td>
            <td>{{ $class->batch }}</td>
            <td>{{ $class->topics }}</td>
            <td>{{ $class->start_time }}</td>
            <td>{{ $class->duration }}</td>
            <td>
                @if ($class->is_completed == 0)

                    <a href="{{ $class->join_url }}" target="_blank"><button
                            class="btn btn-sm btn-success"><span class="fa fa-play-circle "></span> Join
                            Class</button></a>
                @else
                    <button
                            class="btn btn-sm btn-warning" data-toggle="modal" data-target="#openreviewsmodal" onclick="openfeedbackmodal('{{$class->class_id}}','{{$class->subject_id}}','{{$class->tutor_id}}')"><span class="fa fa-check "></span> Give Feedback</button>
                @endforelse

            </td>
            {{-- <td><button class="btn btn-sm btn-primary"
                onclick="openstudentmodal({{ $liveclass->batch_id }});"><span
                    class="fa fa-search"></span> Start Class</button>
            </td> --}}
        </tr>
    @endforeach
@endif
