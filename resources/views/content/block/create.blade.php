@inject('request', 'Illuminate\Http\Request')
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <!-- <h5 class="modal-title">Add New block</h5> -->
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-sm-12">
          <div role="tablist" aria-multiselectable="true">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Add New Block</h4>
              </div>
              <div class="card-body">
                <div class="accordion accordion-border" id="accordionBorder">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingBorderOne">
                      <button class="accordion-button collapsed modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'text']) }}" type="button" data-bs-toggle="collapse" data-bs-target="#text" aria-expanded="false" aria-controls="text">
                        <span data-feather="type" class="mx-2"></span>Text
                      </button>
                    </h2>
                    <div id="text" class="accordion-collapse collapse" aria-labelledby="headingBorderOne" data-bs-parent="#accordionBorder">
                      <div class="accordion-body">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="accordion accordion-border" id="accordionBorder">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingBorderOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#image" aria-expanded="false" aria-controls="image">
                        <span data-feather="image" class="mx-2"></span>Images & Video
                      </button>
                    </h2>
                    <div id="image" class="accordion-collapse collapse" aria-labelledby="headingBorderOne" data-bs-parent="#accordionBorder">
                      <div class="accordion-body">
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'image']) }}">
                            <span data-feather="image" class="mx-2"></span>Image
                          </button>
                        </h2>
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'slideshow']) }}">
                            <span data-feather="camera" class="mx-2"></span>Photo Gallery / Slideshow
                          </button>
                        </h2>
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'video']) }}">
                            <span data-feather="video" class="mx-2"></span>Video (Youtube, Vilmeo, Facebook & Wistia)
                          </button>
                        </h2>
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'imagetitle']) }}">
                            <span data-feather="user" class="mx-2"></span>Image With Title
                          </button>
                        </h2>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="accordion accordion-border" id="accordionBorder">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingBorderOne">
                      <button class="accordion-button collapsed modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'coupon']) }}" type="button" data-bs-toggle="collapse" data-bs-target="#coupon" aria-expanded="false" aria-controls="coupon">
                        <span data-feather="tag" class="mx-2"></span> Create a Coupon
                      </button>
                    </h2>
                    <div id="coupon" class="accordion-collapse collapse" aria-labelledby="headingBorderOne" data-bs-parent="#accordionBorder">
                      <div class="accordion-body">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="accordion accordion-border" id="accordionBorder">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingBorderOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#event" aria-expanded="false" aria-controls="event">
                        <span data-feather="sunset" class="mx-2"></span>Event & Contact Form
                      </button>
                    </h2>
                    <div id="event" class="accordion-collapse collapse" aria-labelledby="headingBorderOne" data-bs-parent="#accordionBorder">
                      <div class="accordion-body">
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'contactForm']) }}">
                            <span data-feather="file-minus" class="mx-2"></span>Contact Form
                          </button>
                        </h2>
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'event']) }}">
                            <span data-feather="paperclip" class="mx-2"></span>Add Event
                          </button>
                        </h2>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="accordion accordion-border" id="accordionBorder">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingBorderOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#attachment" aria-expanded="false" aria-controls="attachment">
                        <span data-feather="link" class="mx-2"></span>Attachment
                      </button>
                    </h2>
                    <div id="attachment" class="accordion-collapse collapse" aria-labelledby="headingBorderOne" data-bs-parent="#accordionBorder">
                      <div class="accordion-body">
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'document']) }}">
                            <span data-feather="file-text" class="mx-2"></span>Document
                          </button>
                        </h2>
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'audio']) }}">
                            <span data-feather="music" class="mx-2"></span>Audio (mp3, mp4)
                          </button>
                        </h2>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="accordion accordion-border" id="accordionBorder">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingBorderOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contactinfo" aria-expanded="false" aria-controls="contactinfo">
                        <span data-feather="user" class="mx-2"></span>Contact Information
                      </button>
                    </h2>
                    <div id="contactinfo" class="accordion-collapse collapse" aria-labelledby="headingBorderOne" data-bs-parent="#accordionBorder">
                      <div class="accordion-body">
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'nameinfo']) }}">
                            <span data-feather="info" class="mx-2"></span>Name, Title, Business
                          </button>
                        </h2>
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'address']) }}">
                            <span data-feather="phone" class="mx-2"></span>Phone, Addresess
                          </button>
                        </h2>
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'profilephoto']) }}">
                            <span data-feather="image" class="mx-2"></span>Profile Photo and Logo
                          </button>
                        </h2>
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'socialmedia']) }}">
                            <span data-feather="thumbs-up" class="mx-2"></span>Social Media
                          </button>
                        </h2>
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'reachmeonline']) }}">
                            <span data-feather="inbox" class="mx-2"></span>Reach Me Online
                          </button>
                        </h2>
              <!--           <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'importantlinks']) }}">
                            <span data-feather="link-2" class="mx-2"></span>Important Links
                          </button>
                        </h2> -->
                      </div>
                    </div>
                  </div>
                </div>

                <div class="accordion accordion-border" id="accordionBorder">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingBorderOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#buttons" aria-expanded="false" aria-controls="buttons">
                        <span data-feather="layout" class="mx-2"></span>Buttons
                      </button>
                    </h2>
                    <div id="buttons" class="accordion-collapse collapse" aria-labelledby="headingBorderOne" data-bs-parent="#accordionBorder">
                      <div class="accordion-body">
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'customBtn']) }}">
                            <span data-feather="folder" class="mx-2"></span>The Button Maker
                          </button>
                        </h2>
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'preformattedBtn']) }}">
                            <span data-feather="grid" class="mx-2"></span>Preformatted Buttons
                          </button>
                        </h2>
                        <h2 class="accordion-header">
                          <button class="accordion-button modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'socialShare']) }}">
                            <span data-feather="share" class="mx-2"></span>Share Buttons
                          </button>
                        </h2>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="accordion accordion-border" id="accordionBorder">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingBorderOne">
                      <button class="accordion-button collapsed modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'paypal']) }}" type="button" data-bs-toggle="collapse" data-bs-target="#paypal" aria-expanded="false" aria-controls="paypal">
                        <span data-feather="dollar-sign" class="mx-2"></span>Paypal
                      </button>
                    </h2>
                    <div id="paypal" class="accordion-collapse collapse" aria-labelledby="headingBorderOne" data-bs-parent="#accordionBorder">
                      <div class="accordion-body">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="accordion accordion-border" id="accordionBorder">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingBorderOne">
                      <button class="accordion-button collapsed modal_button" data-action="{{ route('block.create.type', ['page' => $page, 'type' => 'html']) }}" type="button" data-bs-toggle="collapse" data-bs-target="#html" aria-expanded="false" aria-controls="html">
                        <span data-feather="code" class="mx-2"></span>Html
                      </button>
                    </h2>
                    <div id="html" class="accordion-collapse collapse" aria-labelledby="headingBorderOne" data-bs-parent="#accordionBorder">
                      <div class="accordion-body">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


