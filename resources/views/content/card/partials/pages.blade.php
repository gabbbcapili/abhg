<div class="row">
    <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Add & Edit Your Pages</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary modal_button" data-action="{{ route('page.create', $card) }}">Add Page</button> <button class="btn btn-primary">Customize Theme</button>
                        <div class="row mt-1">
                            <div class="col-md-12 col-sm-12" id="">
                              <div class="list-group"role="tablist"  id="sortable-pages" >

                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="page-content page-container" id="page-content">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-block border border-secondary">
                            <div class="row p-1" id="sortable-blocks">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
