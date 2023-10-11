@extends ('layout.console')

@section ('content')

    <section>
        
        <h2>Add Guest</h2>

        <form method="post" action="/console/guests/add" novalidate>
            @csrf

            <div>
            <label for="guest_fname">First Name:</label>
            <input type="text" name="guest_fname" id="guest_fname" value="{{old('guest_fname')}}" required>
            
            @if ($errors->first('guest_fname'))
                <br>
                <span>{{$errors->first('guest_fname')}}</span>
            @endif
            </div>

            <div>
            <label for="guest_lname">Last Name:</label>
            <input type="text" name="guest_lname" id="guest_lname" value="{{old('guest_lname')}}" required>
            
            @if ($errors->first('guest_lname'))
                <br>
                <span>{{$errors->first('guest_lname')}}</span>
            @endif
            </div>

            <div>
            <label for="guest_remarks">Remarks:</label>
            <input type="text" name="guest_remarks" id="guest_remarks" value="{{old('guest_remarks')}}">
            
            @if ($errors->first('guest_remarks'))
                <br>
                <span>{{$errors->first('guest_remarks')}}</span>
            @endif
            </div>

            <div>

            <label for="group_id">Group:</label>
            <select name="group_id" id="group_id">
                    <option value="">To be assigned</option>
                    @foreach ($groups as $group)
                        <option value="{{$group->group_id}}">
                            {{$group->group_id}} - 
                            {{$group->group_name}}
                        </option>
                    @endforeach
            </select>
                @if ($errors->first('group_id'))
                    <br>
                    <span>{{$errors->first('group_id')}}</span>
                @endif
            </div>

            <div>
            <label for="table_id">Table:</label>
            <select name="table_id" id="table_id">
                <option value="">To be assigned</option>
                @foreach ($tables as $table)
                    <option value="{{$table->table_id}}"
                        {{$table->id == old('table_id') ? 'selected' : ''}}>
                        {{$table->table_id}}
                    </option>
                @endforeach
            </select>
            @if ($errors->first('table_id'))
                <br>
                <span>{{$errors->first('table_id')}}</span>
            @endif
            </div>


            <button type="submit">Add Guest</button>


        </form>

        <a href="/console/guests/list">Back to Guest List</a>

    </section>

@endsection