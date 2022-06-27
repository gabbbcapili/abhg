<div class="row mb-2">
  <!-- Basic Tabs starts -->
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Contact Information</h4>
        </div>
        <div class="card-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="contact-tab" data-bs-toggle="tab" href="#contact" aria-controls="contact" role="tab" aria-selected="true" >Contact Info</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" id="social-tab" data-bs-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="true" >Social Media Links</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" id="reachme-tab" data-bs-toggle="tab" href="#reachme" aria-controls="reachme" role="tab" aria-selected="true" >Reach me Online</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" id="links-tab" data-bs-toggle="tab" href="#links" aria-controls="links" role="tab" aria-selected="true" >Important Links</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" id="picture-tab" data-bs-toggle="tab" href="#picture" aria-controls="picture" role="tab" aria-selected="true" >Picture & Logo</a
              >
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="contact" aria-labelledby="contact-tab" role="tabpanel">
              @include('content.card.partials.contact.contact')
            </div>
            <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
              @include('content.card.partials.contact.social')
            </div>
            <div class="tab-pane" id="reachme" aria-labelledby="reachme-tab" role="tabpanel">
              @include('content.card.partials.contact.reachme')
            </div>
            <div class="tab-pane" id="links" aria-labelledby="links-tab" role="tabpanel">
              @include('content.card.partials.contact.links')
            </div>
            <div class="tab-pane" id="picture" aria-labelledby="picture-tab" role="tabpanel">
              @include('content.card.partials.contact.picture')
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Basic Tabs ends -->
</div>
