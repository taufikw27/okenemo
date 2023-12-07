
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('users.create') }}">
                @csrf
                <div class="col-12">
                  <label for="yourName" class="form-label">Your Name</label>
                  <input type="text" name="name" class="form-control" id="yourName" required>
                  <div class="invalid-feedback">Please, enter your name!</div>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="col-12">
                  <label for="yourEmail" class="form-label">Your Email</label>
                  <input type="email" name="email" class="form-control" id="yourEmail" required>
                  <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                  @error('email')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>


                <div class="col-12">
                  <label for="yourPassword" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="yourPassword" required>
                  <div class="invalid-feedback">Please enter your password!</div>
                  @error('password')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>
                <div class="col-12">
                    <label for="yourPassword" class="form-label">Select a Role</label>
                    <select name="role" class="form-control" id="selectedValue" required>
                      <option value="" selected disabled>Select an option</option>
                      <option value="admin">Admin</option>
                      <option value="pengawas">Pengawas</option>
                      <!-- Add more options as needed -->
                    </select>
                    <div class="invalid-feedback">Please select an option!</div>
                    @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                  </div>
                
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Users</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('put')
                <div class="col-12">
                  <label for="yourName" class="form-label">Your Name</label>
                  <input type="text" name="name" class="form-control" id="yourName" value="{{ $user->name }}" required>
                  <div class="invalid-feedback">Please, enter your name!</div>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="col-12">
                  <label for="yourEmail" class="form-label">Your Email</label>
                  <input type="email" name="email" class="form-control" id="yourEmail" value="{{ $user->email }}" required>
                  <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                  @error('email')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>


                <div class="col-12">
                  <label for="yourPassword" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="yourPassword" required>
                  <div class="invalid-feedback">Please enter your password!</div>
                  @error('password')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>
                <div class="col-12">
                    <label for="yourPassword" class="form-label">Select a Role</label>
                    <select name="role" class="form-control" id="selectedValue" required>
                        <option value="" disabled>Select an option</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="pengawas" {{ $user->role == 'pengawas' ? 'selected' : '' }}>Pengawas</option>
                        <!-- Add more options as needed -->
                    </select>
                    <div class="invalid-feedback">Please select an option!</div>
                    @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                  </div>
                
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>