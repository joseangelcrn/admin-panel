@extends('layouts.app')

@section('title','Admin - Editar tarea')

@section('styles')
    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link rel="tstylesheet" type="text/css" href="{{asset('js/multi-select/dist/css/bootstrap-multiselect.css')}}">

@endsection

@section('content')

    @section('header','Editar tarea')

    <div class="container card shadow p-5">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <form action="{{route('task.update',$task->id)}}" method="post">
                @csrf
                @method('put')

                {{-- Task Crud --}}
                <div class="form-group" style="display: none;">
                    <input type="text" name="task_id" class="form-control"  required value="{{$task->id}}">
                </div>
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Titulo de la tarea" required value="{{$task->title}}">
                </div>
                <div class="form-group">
                    <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Descripcion de la tarea" required>{{$task->description}}</textarea>
                </div>
                {{-- User assign --}}
                <hr>
                <div class="form-group row d-flex justify-content-center">
                    <div class="col-12">
                        <h3>Asignar tarea a usuarios</h3>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <select id="user-selector"  multiple="multiple" style="display: none;" name="user_id[]">
                            @foreach ($users as $user)
                                <option value="{{$user->id}}" data-name="{{$user->name}}"
                                    @if ($task->users->contains($user->id))
                                     selected
                                    @endif
                                    >{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                  <button class="btn btn-info" type="submit">
                      Editar tarea
                  </button>
                </div>
            </form>
          </div>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/multi-select/dist/js/bootstrap-multiselect.js')}}"></script>
    <script>
        var user_selector = $('#user-selector');
        var assigned_users_list = $('#assigned_users_list');
        var btn_assign_user = $('#btn_assign_user');


        $(function(){
            user_selector.multiselect({

            // allows HTML content
            enableHTML: false,

            // CSS class of the multiselect button
            buttonClass: 'custom-select',

            // inherits the class of the button from the original select
            inheritClass: false,

            // width of the multiselect button
            buttonWidth: 'auto',

            // container that holds both the button as well as the dropdown
            buttonContainer: '<div class="btn-group" />',

            // places the dropdown on the right side
            dropRight: false,

            // places the dropdown on the top
            dropUp: false,

            // CSS class of the selected option
            selectedClass: 'active',

            // maximum height of the dropdown menu
            // if maximum height is exceeded a scrollbar will be displayed
            maxHeight: false,

            // includes Select All Option
            includeSelectAllOption: true,

            // shows the Select All Option if options are more than ...
            includeSelectAllIfMoreThan: 0,

            // Lable of Select All
            selectAllText: 'Todos los usuarios',

            // the select all option is added as additional option within the select
            // o distinguish this option from the original options the value used for the select all option can be configured using the selectAllValue option.
            selectAllValue: 'multiselect-all',

            // control the name given to the select all option
            selectAllName: true,

            // if true, the number of selected options will be shown in parantheses when all options are seleted.
            selectAllNumber: true,

            // setting both includeSelectAllOption and enableFiltering to true, the select all option does always select only the visible option
            // with setting selectAllJustVisible to false this behavior is changed such that always all options (irrespective of whether they are visible) are selected
            selectAllJustVisible: true,

            // enables filtering
            enableFiltering: true,

            // determines if is case sensitive when filtering
            enableCaseInsensitiveFiltering: false,

            // enables full value filtering
            enableFullValueFiltering: false,

            // if true, optgroup's will be clickable, allowing to easily select multiple options belonging to the same group
            enableClickableOptGroups: false,

            // enables collapsible OptGroups
            enableCollapsibleOptGroups: false,

            // collapses all OptGroups on init
            collapseOptGroupsByDefault: false,

            // placeholder of filter filed
            filterPlaceholder: 'Search',

            // possible options: 'text', 'value', 'both'
            filterBehavior: 'text',

            // includes clear button inside the filter filed
            includeFilterClearBtn: true,

            // prevents input change event
            preventInputChangeEvent: false,

            // message to display when no option is selected
            nonSelectedText: 'Seleccionar',

            // message to display if more than numberDisplayed options are selected
            nSelectedText: 'selected',

            // message to display if all options are selected
            allSelectedText: 'Todos',

            // determines if too many options would be displayed
            numberDisplayed: 3,

            // disables the multiselect if empty
            disableIfEmpty: false,

            // message to display if the multiselect is disabled
            disabledText: '',

            // the separator for the list of selected items for mouse-over
            delimiterText: ', ',

            // includes Reset Option
            includeResetOption: false,

            // includes Rest Divider
            includeResetDivider: false,

            // lable of Reset  Option
            resetText: 'Reset',

            // custom templates
            templates: {
                button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"><span class="multiselect-selected-text"></span></button>',
                filter: '<div class="multiselect-filter"><div class="input-group input-group-sm p-1"><div class="input-group-prepend"><i class="input-group-text fas fa-search"></i></div><input class="form-control multiselect-search" type="text" /></div></div>',
                filterClearBtn: '<div class="input-group-append"><button class="multiselect-clear-filter input-group-text" type="button"><i class="fas fa-times"></i></button></div>',
                option: '<button class="multiselect-option dropdown-item"></button>',
                divider: '<div class="dropdown-divider"></div>',
                optionGroup: '<button class="multiselect-group dropdown-item"></button>',
                resetButton: '<div class="multiselect-reset text-center p-2"><button class="btn btn-sm btn-block btn-outline-secondary"></button></div>'
            }

            });
        });

    </script>
@endsection

