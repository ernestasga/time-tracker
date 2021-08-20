<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#newTaskModal">
    {{__('tasks.new_task')}}
  </button>

  <!-- Modal -->
  <div class="modal fade" id="newTaskModal" tabindex="-1" role="dialog" aria-labelledby="newTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newTaskModalLabel">{{__('tasks.new_task')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('task.store')}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>{{__('tasks.title')}}</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'error' : '' }}" name="title" id="title">
                    <!-- Error -->
                    @if ($errors->has('title'))
                    <div class="error">
                        {{ $errors->first('title') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{__('tasks.comment')}}</label>
                    <textarea class="form-control {{ $errors->has('comment') ? 'error' : '' }}" name="comment" id="comment" rows="5"></textarea>
                    <!-- Error -->
                    @if ($errors->has('comment'))
                    <div class="error">
                        {{ $errors->first('comment') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{__('tasks.date')}}</label>
                    <input type="date" class="form-control {{ $errors->has('date') ? 'error' : '' }}" name="date" id="date">
                    <!-- Error -->
                    @if ($errors->has('date'))
                    <div class="error">
                        {{ $errors->first('date') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{__('tasks.mins_spent')}}</label>
                    <input type="number" class="form-control {{ $errors->has('mins_spent') ? 'error' : '' }}" name="mins_spent" id="mins_spent" min="0" max="100000">
                    <!-- Error -->
                    @if ($errors->has('mins_spent'))
                    <div class="error">
                        {{ $errors->first('mins_spent') }}
                    </div>
                    @endif
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('tasks.cancel')}}</button>
            <button type="submit" class="btn btn-primary">{{__('tasks.create')}}</button>
            </div>
        </form>

      </div>
    </div>
  </div>
