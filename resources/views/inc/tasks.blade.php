@if ($tasks->count() > 0)
<table class="table table-striped table-dark table-responsive">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Comment</th>
        <th scope="col">Date</th>
        <th scope="col">Time spent</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
          <tr id="task-{{$task->id}}">
            <th scope="row">{{$loop->index}}</th>
            <td>{{$task->title}}</td>
            <td>{{$task->comment}}</td>
            <td>{{$task->date->toDateString()}}</td>
            <td>
                @if($task->mins_spent < 60)
                    {{$task->mins_spent}} mins.
                @else
                    @php
                        $hours = floor($task->mins_spent / 60);
                        $mins = $task->mins_spent % 60;
                        echo $hours.' hours '.$mins.' mins.';
                    @endphp
                @endif
            </td>
            <td>
                <button type="button" data-id="{{$task->id}}" data-token="{{csrf_token()}}" class="delete-task my-2 mr-2 btn-danger">Delete</button>
            </td>

          </tr>
        @endforeach
    </tbody>
</table>
@else
<h2 class="text-center">No tasks</h2>
@endif
@if (Route::current()->getName() == 'home')
    {{$tasks->links()}}
@endif
