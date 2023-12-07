@if (count($bi) === 0)
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('barangIN.create') }}">
                @csrf
                <div class="col-12">
                  <label for="yourName" class="form-label">Date In</label>
                  <input type="date" name="date" class="form-control" id="yourName" required>
                  <div class="invalid-feedback">Please, enter your Item!</div>
                  @error('date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-12">
                  <label for="yourName" class="form-label">Qty</label>
                  <input type="number" name="qty" class="form-control" id="yourName" required>
                  <div class="invalid-feedback">Please, enter your qty!</div>
                  @error('qty')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-12">
                  <label for="yourPassword" class="form-label">Select a Item</label>
                  <select name="barang" class="form-control" id="selectedValue" required>
                      <option value="" disabled>Select an option</option>
                      @foreach ($barang as $item)
                      <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                      @endforeach
                      <!-- Add more options as needed -->
                  </select>
                  <div class="invalid-feedback">Please select an option!</div>
                  @error('barang')
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
 @else
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('barangIN.create') }}">
          @csrf
          <div class="col-12">
            <label for="yourName" class="form-label">Date In</label>
            <input type="date" name="date" class="form-control" id="yourName" required>
            <div class="invalid-feedback">Please, enter your Item!</div>
            @error('date')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>
          <div class="col-12">
            <label for="yourName" class="form-label">Qty</label>
            <input type="number" name="qty" class="form-control" id="yourName" required>
            <div class="invalid-feedback">Please, enter your qty!</div>
            @error('qty')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          </div>
          <div class="col-12">
            <label for="yourPassword" class="form-label">Select a Item</label>
            <select name="barang" class="form-control" id="selectedValue" required>
                <option value="" disabled>Select an option</option>
                @foreach ($barang as $item)
                <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                @endforeach
                <!-- Add more options as needed -->
            </select>
            <div class="invalid-feedback">Please select an option!</div>
            @error('barang')
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
<div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('barangIN.update', $item->id) }}">
                @csrf
                @method('put')
                <div class="col-12">
                  <label for="yourName" class="form-label">Date In</label>
                  <input type="date" name="date" class="form-control" id="yourName" required>
                  <div class="invalid-feedback">Please, enter your Item!</div>
                  @error('date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-12">
                  <label for="yourName" class="form-label">Qty</label>
                  <input type="number" name="qty" class="form-control" id="yourName" required>
                  <div class="invalid-feedback">Please, enter your qty!</div>
                  @error('qty')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-12">
                  <label for="yourPassword" class="form-label">Select a Item</label>
                  <select name="barang" class="form-control" id="selectedValue" required>
                      <option value="" disabled>Select an option</option>
                      @foreach ($barang as $item)
                      <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                      @endforeach
                      <!-- Add more options as needed -->
                  </select>
                  <div class="invalid-feedback">Please select an option!</div>
                  @error('barang')
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
  @endif