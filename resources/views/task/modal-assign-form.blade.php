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
                <form action="#" method="post">
                    <div class="form-group">
                        <select class="form-control" name="" id="" required>
                            <option value="">Selecciona una tarea</option>
                            @foreach(App\Models\Task::getNotAssigned() as $task)
                                <option value="{{$task->id}}">{{$task->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
