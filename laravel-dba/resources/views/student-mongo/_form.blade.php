@csrf
    <div class="form-group">
        <label for="first_name">First name</label>
        <input type="text" class="form-control" name="first_name"
        id="first_name" aria-describedby="helpId" placeholder="" value="{{ $student->first_name }}">
    </div>

    <div class="form-group">
        <label for="last_name">Last name</label>
        <input type="text" class="form-control"
        name="last_name" id="last_name" aria-describedby="helpId"
        placeholder="" value="{{ $student->last_name }}">
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <textarea class="form-control" name="address" id="" rows="3">
            {{ $student->address }}
        </textarea>
    </div>

    <div class="form-group">
        <label for="dob">DOB</label>
        <input type="date" class="form-control" name="dob" id="dob"
        aria-describedby="helpId" placeholder="" value="{{ $student->dob }}">
    </div>
