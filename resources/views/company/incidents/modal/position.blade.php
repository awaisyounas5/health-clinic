<div class="modal fade" id="addPositionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body p-md-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2 pb-1">Add Position</h3>
                </div>
                <p>Enter a new position in your list</p>
                <form id="positionForm" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="newPosition" name="newPosition" class="form-control"
                                placeholder="Enter Position" required />
                            <label for="newPosition">Enter Position <span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
       $("#positionForm").on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/company/incidents/store_position',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data) {

                    $("#addPositionModal").modal('toggle');
                    $("#newPosition").val('');
                    $("#position").html(data.position);
                },
                error: function() {
                    alert('There was an error fetching events!');
                }
            });
        })

</script>
