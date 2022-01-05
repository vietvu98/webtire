@extends('admin.dashboard')
@section('admin_content')

     <!-- Form Basic -->
     <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Create User</h6>
        </div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <label for="txtName">Name</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label for="txtEmail">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Mail">
            </div>
            <div class="form-group">
              <label for="txtPassword">Password</label>
              <input type="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group" id="simple-date1">
              <label for="simpleDataInput">Birthday</label>
                <div class="input-group date">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="text" class="form-control" value="2002/06/06" id="simpleDataInput">
                </div>
            </div>
            <div class="form-group">
              <label for="select2SinglePlaceholder">Level</label>
              <select class="select2-single-placeholder form-control" name="state" id="select2SinglePlaceholder">
                <option value="">Select</option>
                <option value="Aceh">Aceh</option>
                <option value="Sumatra Utara">Sumatra Utara</option>
                <option value="Sumatra Barat">Sumatra Barat</option>
                <option value="Riau">Riau</option>
                <option value="Kepulauan Riau">Kepulauan Riau</option>
                <option value="Jambi">Jambi</option>
                <option value="Bengkulu">Bengkulu</option>
                <option value="Sumatra Selatan">Sumatra Selatan</option>
                <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                <option value="Lampung">Lampung</option>
                <option value="Banten">Banten</option>
              </select>
            </div>            
            <div class="form-group">
              <label for="select2SinglePlaceholder1">Status</label>
              <select class="select2-single-placeholder form-control" name="state" id="select2SinglePlaceholder1">
                <option value="">Select</option>
                <option value="Aceh">Aceh</option>
                <option value="Sumatra Utara">Sumatra Utara</option>
                <option value="Sumatra Barat">Sumatra Barat</option>
                <option value="Riau">Riau</option>
                <option value="Kepulauan Riau">Kepulauan Riau</option>
                <option value="Jambi">Jambi</option>
                <option value="Bengkulu">Bengkulu</option>
                <option value="Sumatra Selatan">Sumatra Selatan</option>
                <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                <option value="Lampung">Lampung</option>
                <option value="Banten">Banten</option>
              </select>
            </div>
            <div class="form-group">
              <label>Avatar</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      
@endsection