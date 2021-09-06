
<template>
  <div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-8">
                <tab-content title="Billing Info">
                  <div>
                    <h4 class="header-title">
                      Fill in the details
                    </h4>
                    <h6 class="sub-header">
                      About the job
                    </h6>

                    <form>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" class="form-control" type="text" placeholder="Some text value...">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group mt-3">
                            <label for="example-textarea">Description</label>
                            <textarea id="example-textarea" class="form-control" rows="3" placeholder="Write some note.." />
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label>Job type</label>
                            <select data-toggle="select2" title="Job type" class="form-control">
                              <option value="0">
                                All types
                              </option>
                              <option value="AF">
                                Part time
                              </option>
                              <option value="AL">
                                Full time
                              </option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="date" label-cols-sm="2" label-cols-lg="2" label="Date" label-for="date">Date</label>
                            <b-form-input id="date" value="2019-08-19" type="date" />
                          </div>
                        </div>
                      </div>

                      <!-- <tab-content title="Product Images">
                        <h4 class="header-title">
                          Product Images
                        </h4>
                        <p class="sub-header">
                          Upload product image
                        </p>

                        <vue-dropzone id="dropzone" ref="myVueDropzone" :use-custom-slot="true" :options="dropzoneOptions">
                          <div class="dz-message needsclick">
                            <i class="h1 text-muted ri-upload-cloud-2-line" />
                            <h3>Drop files here or click to upload.</h3>
                            <span class="text-muted font-13">
                              (This is just a demo dropzone. Selected files are
                              <strong>not</strong> actually uploaded.)
                            </span>
                          </div>
                        </vue-dropzone>
                      </tab-content> -->

                      <h6 class="sub-header">
                        About the employeer
                      </h6>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="employeer-name">Employeer name</label>
                            <input id="employeer-name" class="form-control" type="text" placeholder="Enter name">
                          </div>
                        </div>
                      </div>

                      <h6 class="sub-header">
                        Contact details
                      </h6>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="billing-email-address">Email Address
                              <span class="text-danger">*</span></label>
                            <input id="billing-email-address" class="form-control" type="email" placeholder="Enter your email">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="billing-phone">Phone <span class="text-danger">*</span></label>
                            <input id="billing-phone" class="form-control" type="text" placeholder="(xx) xxx xxxx xxx">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <ul class="pager wizard list-inline mt-2">
                    <li class="next list-inline-item float-right">
                      <button type="button" class="btn btn-success">
                        <i class="mdi mdi-truck-fast mr-1" /> Post vacancy
                      </button>
                    </li>
                  </ul>
                </tab-content>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->
  </div>
</template>

<script>

/**
 * Checkout component
 */
export default {
  components: {
  },
  data () {
    return {
    }
  }
}
</script>
