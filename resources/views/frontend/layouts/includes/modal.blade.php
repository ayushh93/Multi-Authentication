<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Have a question?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="fname">Full Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="fname" aria-describedby="fullname"
                        placeholder="Enter Your Full Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" aria-describedby="emailHelp"
                        placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                    <label for="serviceselect">Country<span class="text-danger">*</span></label>
                    <select id="serviceselect" class="form-control" name="serviceselect">
                        <option selected>Nepal</option>
                        <option>USA</option>
                        <option>Italy</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Enter Your Message<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>