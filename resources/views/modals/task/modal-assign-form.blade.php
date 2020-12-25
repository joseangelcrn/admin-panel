<div class="modal fade" id="modal-task-assign" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Asignar tarea a un usuario</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('task.assign')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label>Tarea</label>
                        <select class="form-control" name="task_id" required>
                            <option value="">Selecciona una tarea</option>
                            @foreach(App\Models\Task::getNotAssigned() as $task)
                                <option value="{{$task->id}}" title="{{$task->description}}">{{$task->title}}</option>
                            @endforeach
                        </select>
                        <label>Usuario</label>
                        <select class="form-control" name="user_id" required>
                            <option value="">Selecciona una tarea</option>
                              @if(isset($userId))
                                @foreach(App\Models\User::all() as $currentUser)
                                    <option value="{{$currentUser->id}}" {{$currentUser->id == $userId ?  "selected":""}}>{{$currentUser->name}}</option>
                                @endforeach
                                @else
                                @foreach(App\Models\User::all() as $currentUser)
                                    <option value="{{$currentUser->id}}">{{$currentUser->name}}</option>
                                @endforeach
                              @endif
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success" type="submit">Asignar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
