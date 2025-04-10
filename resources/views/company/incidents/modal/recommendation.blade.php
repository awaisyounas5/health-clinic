<div class="modal fade" id="addRecommendationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body p-md-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2 pb-1">Add Recommendation</h3>
                </div>
                <p>Enter a new recommendation in your list</p>
                <form id="recommendationForm" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="newRecommendation" name="newRecommendation"
                                class="form-control" placeholder="Enter Recommendation" required />
                            <label for="newRecommendation">Enter Recommendation <span class="text-danger">*</span></label>
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
 $("#recommendationForm").on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/company/incidents/store_recommendation',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data) {

                    $("#addRecommendationModal").modal('toggle');
                    $("#newRecommendation").val('');
                    $("#recommendations").html(data.recommendations);
                },
                error: function() {
                    alert('There was an error fetching events!');
                }
            });
        })
</script>
