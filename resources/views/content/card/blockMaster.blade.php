@php
    $content = json_decode($block->content, true);
    $card = $block->page->card;
@endphp
@if($block->type == 'text')
    <div class="row mb-2 test-{{ $block->page->card->design_id}} textColor-{{ $design_id }}">
        {!! $block->content !!}
    </div>
@elseif($block->type == 'customBtn')
<div class="row mb-2">
    <div class="d-flex aligns-items-center justify-content-center text-center">
        <a href="#" style="{{ $content['finalCss'] }}" >{{ $content['btnTitle'] }}</a>
    </div>
</div>
@elseif($block->type == 'socialShare')
<div class="row align-items-center justify-content-center text-center mb-2">
    <h4 class="headerColor-{{ $design_id }}">—SHARE—</h4>
    @foreach($content as $key => $val)
        @if($val)
        <img class="input-group-img" style="width: 60px; height: 45px" src="{{ asset('images/social/'. $key .'.png') }}">
        @endif
    @endforeach
</div>
@elseif($block->type == 'preformattedBtn')
    {!! $block->preformattedBtn($content['btnType'], $design_id) !!}
@elseif($block->type == 'paypal')
    <div class="row mb-2 align-items-center justify-content-center text-center">
        <h4>Paypal</h4>
        {!! $content['paypalCode'] !!}
    </div>
@elseif($block->type == 'html')
    <div class="row mb-2" style="height:{{ $content['height'] }}px">
        {!! $content['html'] !!}
    </div>
@elseif($block->type == 'contactForm')
    @php
        $contactForm = App\Models\Block::$contactForm;
    @endphp
    <div class="row mb-2 aligns-items-center justify-content-center">
        {!! $content['headline'] ? '<span class="headerColor-'. $design_id .' }}">'. $content['headline'] .'</span>' : '' !!}
        @foreach($content['form'] as $key => $val)
            @if($val)
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="form-floating">
                            @if($key == 'file')
                            <input type="file" class="form-control" name="{{ $key }}" id="{{ $key }}" placeholder="{{ $contactForm[$key] }}" readonly="true"/>
                            @else
                            <input type="text" class="form-control" name="{{ $key }}" id="{{ $key }}" placeholder="{{ $contactForm[$key] }}" readonly="true"/>
                            @endif
                            <label for="{{ $key }}">{{ $contactForm[$key] }}</label>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        @foreach($content['customField'] as $key => $val)
            @if($val['show'])
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{ $key }}" id="{{ $key }}" placeholder="{{ $val['val'] }}" readonly="true"/>
                            <label class="headerColor-{{ $design_id }}" for="{{ $key }}">{{ $val['val'] }}</label>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="row mb-2 ">
            <div class="d-grid col-12">
                <button type="button" class="btn btn-outline-secondary button-{{ $design_id }}">Submit</button>
            </div>
        </div>
    </div>
@elseif($block->type == 'event')
    @php
        $eventRsvpForm = App\Models\Block::$eventRsvpForm;
        $phone = $block->page->card->user->phones->first();
    @endphp
    <h2 class="text-center headerColor-{{ $design_id }}">{{ $content['title'] }}</h2>
    <div class="row mb-2">
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2 headerColor-{{ $design_id }}">Start Date:</p>
            <p class="ps-2 textColor-{{ $design_id }}">{{ Carbon\Carbon::parse($content['startDate'])->format('M d, Y H:i a') }}</p>
        </div>
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2 headerColor-{{ $design_id }}">End Date:</p>
            <p class="ps-2 textColor-{{ $design_id }}">{{ Carbon\Carbon::parse($content['endDate'])->format('M d, Y H:i a') }}</p>
        </div>
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2 headerColor-{{ $design_id }}">Timezone:</p>
            <p class="ps-2 textColor-{{ $design_id }}">{{ $content['timezone'] }}</p>
        </div>
        @if($content['venue'])
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2 headerColor-{{ $design_id }}">Venue: </p>
            <p class="ps-2 textColor-{{ $design_id }}"> {{ $content['venue'] }}</p>
        </div>
        @endif
        @if($content['zip'] || $content['street'] || $content['city'] || $content['state'])
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2 headerColor-{{ $design_id }}">Location:</p>
            <p class="ps-2 textColor-{{ $design_id }}">{{ $content['street'] }} {{ $content['city'] }} {{ $content['state'] }} {{ $content['zip'] }}</p>
        </div>
        @endif
        @if($content['mapit'])
        <div class="row mb-2 ">
            <div class="d-grid col-12">
                <a target="_blank" href="https://www.google.com/maps?q={{ $content['venue'] }}+{{ $content['street'] }}+{{ $content['city'] }}+{{ $content['state'] }}+{{ $content['zip'] }}" class="btn btn-outline-secondary button-{{ $design_id }}">Map It</a>
            </div>
        </div>
        @endif
        @if($content['description'])
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2 headerColor-{{ $design_id }}">Description: </p>
            <p class="ps-2 textColor-{{ $design_id }}"> {{ $content['description'] }}</p>
        </div>
        @endif
        @if($content['tickets'])
        <div class="row mb-2 ">
            <div class="d-grid col-12">
                <a target="_blank" href="{{ $content['tickets'] }}" class="btn btn-outline-secondary button-{{ $design_id }}">Tickets</a>
            </div>
        </div>
        @endif
        @if($content['register'])
        <div class="row mb-2 ">
            <div class="d-grid col-12">
                <a target="_blank" href="{{ $content['register'] }}" class="btn btn-outline-secondary button-{{ $design_id }}">Register</a>
            </div>
        </div>
        @endif
        @if($content['webinar'])
        <div class="row mb-2 ">
            <div class="d-grid col-12">
                <a target="_blank" href="{{ $content['webinar'] }}" class="btn btn-outline-secondary button-{{ $design_id }}">Register for Webinar</a>
            </div>
        </div>
        @endif
        @if($content['webinarInstructions'])
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2 headerColor-{{ $design_id }}">Webinar Instructions: </p>
            <p class="ps-2 linkColor-{{ $design_id }}"> {{ $content['webinarInstructions'] }}</p>
        </div>
        @endif
    </div>
    @if($content['showRsvpForm'])
        <h4 class="text-center headerColor-{{ $design_id }}">Please RSVP</h4>

        @foreach($content['rsvpForm'] as $key => $val)
            @if($val)
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{ $key }}" id="{{ $key }}" placeholder="{{ $eventRsvpForm[$key] }}" readonly="true"/>
                            <label for="{{ $key }}">{{ $eventRsvpForm[$key] }}</label>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="row mb-2 ">
                <div class="d-grid col-12">
                    <button type="button" class="btn btn-outline-secondary button-{{ $design_id }}">Submit</button>
                </div>
        </div>
    @endif
    @if($content['followMe'])
    <div class="row mb-2">
        <div class="d-grid col-12">
          <a class="btn btn-outline-secondary button-{{ $design_id }}"><span data-feather="users"></span> Follow Me</a>
        </div>
    </div>
    @endif
    @if($content['shareByText'] || $content['shareByEmail'])
    <div class="row mb-2">
        @if($content['shareByText'])
        <div class="d-grid col-6">
          <a class="btn btn-outline-secondary button-{{ $design_id }}" href="sms:{{ $phone ? $phone->val : '' }}/?body={{ $card->url }}"><span data-feather="file-text"></span> Share By Text</a>
        </div>
        @endif
        @if($content['shareByEmail'])
        <div class="d-grid col-6">
          <a class="btn btn-outline-secondary button-{{ $design_id }}"><span data-feather="mail"></span> Share By Email</a>
        </div>
        @endif
    </div>
    @endif
@elseif($block->type == 'coupon')
    @php
    $backgroundImage = $block->media($content['backgroundImage']) ? $block->media($content['backgroundImage'])->fileUrl() : null;
    $image = $block->media($content['image'])? $block->media($content['image'])->fileUrl() : null;
    @endphp
    <div class="row mb-2" style="{{ $backgroundImage ? 'background-image: url(' . $backgroundImage . ');' : '' }} {{ $content['borderStyle'] ? 'border-style: ' . $content['borderStyle'] : '' }}">
        @if($image)
            <img src="{{ $image }}" height="160px">
        @endif
        <h2 class="text-center headerColor-{{ $design_id }}">{{ $content['title'] }}</h2>

        <span class="textColor-{{ $design_id }}">{!! $content['description'] !!}</span>
        @if($content['terms'])
            <div class="d-flex align-items-center">
                <p class="fw-bold ps-2 headerColor-{{ $design_id }}">Terms:</p>
                <p class="ps-2 textColor-{{ $design_id }}">{{ $content['terms']}}</p>
            </div>
        @endif
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2 headerColor-{{ $design_id }}">Offer:</p>
            <p class="ps-2 textColor-{{ $design_id }}">{{ Carbon\Carbon::parse($content['startDate'])->format('M d') }} - {{ Carbon\Carbon::parse($content['endDate'])->format('M d') }}</p>
        </div>
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2 headerColor-{{ $design_id }}">Expiration:</p>
            <p class="ps-2 textColor-{{ $design_id }}">{{ Carbon\Carbon::parse($content['expires'])->format('M d') }}</p>
        </div>

        @if($content['followMe'])
        <div class="mb-2">
            <div class="d-grid col-12">
              <a class="btn btn-outline-secondary button-{{ $design_id }}"><span data-feather="users"></span> Follow Me</a>
            </div>
        </div>
        @endif
        @if($content['shareByText'] || $content['shareByEmail'])
            @if($content['shareByText'])
            <div class="d-grid col-6">
              <a class="btn btn-outline-secondary button-{{ $design_id }}"><span data-feather="file-text"></span> Share By Text</a>
            </div>
            @endif
            @if($content['shareByEmail'])
            <div class="d-grid col-6">
              <a class="btn btn-outline-secondary button-{{ $design_id }}"><span data-feather="mail"></span> Share By Email</a>
            </div>
            @endif
            <div class="mb-2">
            </div>
        @endif
    </div>





@elseif($block->type == 'document')
    @php
        $media = App\Models\Media::find($content['document'])
    @endphp
    @if($media)
        <div class="row mb-2">
            <div class="d-flex justify-content-left align-items-center">
                <a href="{{ $media->fileUrl() }}" target="_blank">
                    <div class="avatar-wrapper">
                        <div class="me-1">
                            <img src="{{ $media->getTypeImage() }}" alt="Document" height="32" width="32">
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <a href="#" class="user_name text-body text-truncate">
                        <span class="fw-bolder textColor-{{ $design_id }}">{{ $media->title }}</span>
                        </a>
                        @if($media->caption)
                            <small class="emp_post text-muted textColor-{{ $design_id }}">{{ $media->caption }}</small>
                        @endif
                    </div>
                </a>
            </div>
        </div>
    @endif
@elseif($block->type == 'audio')
    @php
        $media = App\Models\Media::find($content['audio'])
    @endphp
    @if($media)
        <div class="row mb-2">
            @if(in_array($media->type, ['mpga','mp3','wav']))
                <audio controls="controls">
                  <source src="{{ $media->fileUrl() }}" type="audio/ogg">
                Your browser does not support the audio element.
                </audio>
                @if($media->caption)
                    <p class="mt-1 text-center textColor-{{ $design_id }}">{{ $media->caption }}</p>
                @endif

            @else
                <video width="320" height="240" controls="controls">
                <source src="{{ $media->fileUrl() }}" type="video/ogg">
                Your browser does not support the video tag.
                </video>
                @if($media->caption)
                    <p class="mt-1 text-center textColor-{{ $design_id }}">{{ $media->caption }}</p>
                @endif
            @endif
        </div>
    @endif
@elseif($block->type == 'image')
    @php
        $media = App\Models\Media::find($content['image'])
    @endphp
    @if($media)
        <div class="row mb-1">
            <img src="{{ $media->fileUrl() }}" class="img-fluid" alt="">
            @if($media->caption)
                <p class="fw-bolder mt-1 text-center textColor-{{ $design_id }}">{{ $media->caption }}</p>
            @endif
        </div>
    @endif

@elseif($block->type == 'slideshow')
    @php
        $medias = App\Models\Media::find($content['slideshow'])
    @endphp
    @if($medias)
    <div class="row mb-1">
        @if($content['displayType'] == 'slideshow')
            <div class="swiper-autoplay swiper-container">
                <div class="swiper-wrapper">
                    @foreach($medias as $media)
                      <div class="swiper-slide">
                        <img class="img-fluid" src="{{ $media->fileUrl() }}" alt="media" />
                      </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        @elseif($content['displayType'] == 'slideshowthumb')
            <div class="swiper-autoplay swiper-container">
                <div class="swiper-wrapper">
                    @foreach($medias as $media)
                      <div class="swiper-slide">
                        <img class="img-fluid" src="{{ $media->fileUrl() }}" alt="media" />
                        <div class="h-100 text-center textColor-{{ $design_id }}">{{ $media->caption }}</div>
                      </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        @else

                @foreach($medias as $media)
                    <div class="col-6 mb-1">
                        <img src="{{ $media->fileUrl() }}" class="img-fluid" alt="">
                    </div>
                @endforeach

        @endif
    </div>
    @endif
@elseif($block->type == 'video')

    <div class="row mb-1">
        {!! $content['embedCode'] !!}
    </div>

@elseif($block->type == 'imagetitle')
    @php
        $media = App\Models\Media::find($content['image'])
    @endphp
    <div class="row mb-1">
        <div class="d-flex justify-content-left align-items-center">
          <div class="avatar  me-1">
            <img src="{{ $media ? $media->fileUrl() : asset('images/media/user.png') }}" alt="Avatar" width="66" height="66">
          </div>
          <div class="d-flex flex-column">
            <h4 class="emp_name text-truncate fw-bold textColor-{{ $design_id }}">{{ $content['text'] }}</h4>
            <small class="emp_post text-truncate text-muted textColor-{{ $design_id }}">{{ $content['subText'] }}</small>
          </div>
        </div>
    </div>
@elseif($block->type == 'nameinfo')
    @php
        $user = $block->page->card->user;
        $contact = $user->contact;
    @endphp
    <div class="row mb-1 text-center">
        <h4 class="fw-bolder headerColor-{{ $design_id }}">{{ $content['show_title'] ? $contact->title : '' }} {{ $content['show_first_name'] ? $user->first_name : '' }} {{ $content['show_last_name'] ? $user->last_name : '' }} </h4>
        @if($content['show_job_title'])<label class="textColor-{{ $design_id }}">{{ $contact->job_title }}</label>@endif
        @if($content['show_business_name'])<label class="textColor-{{ $design_id }}">{{ $contact->business_name }}</label>@endif
    </div>

@elseif($block->type == 'address')
    @php
        $user = $block->page->card->user;
        $contact = $user->contact;
    @endphp
    @if($content['show_phone'])
    @foreach($content['show_phone']['show_phone'] as $key => $val)
        @if($val)
        @php
            $phone = App\Models\PhoneNumber::find($key)
        @endphp
            @if($phone)
                <div class="row mb-1 text-center">
                    <h5><span class="headerColor-{{ $design_id }}">{{ $phone->type }}</span>: <a class="linkColor-{{ $design_id }}" href="tel:{{ $phone->tel }}">{{ $phone->tel }}</a>
                        @if($phone->text == true)
                            <a class="linkColor-{{ $design_id }}" href="sms:{{ $phone->val }}" class="ms-1">
                                <span data-feather="message-square"></span>
                            </a>
                        @endif
                    </h5>
                </div>
            @endif
        @endif
    @endforeach
    @endif
    @if($content['show_address'])
        <div class="row mb-1 text-center">
            <h6 class="textColor-{{ $design_id }}">{{ $contact->address_1 }}</h6>
            <h6 class="textColor-{{ $design_id }}">{{ $contact->address_2 }}</h6>
            <h6 class="textColor-{{ $design_id }}">{{ $contact->city . ', ' .  $contact->state . ' ' . $contact->zip }}</h6>
        </div>
    @endif
    @if($content['show_website'])
        <div class="row mb-1 text-center">
            <h5 class="headerColor-{{ $design_id }}">Website:</h5>
            <label><a  class="linkColor-{{ $design_id }}" target="_blank" href="{{ $contact->website }}">{{ $contact->website }}</a></label>
        </div>
    @endif

@elseif($block->type == 'profilephoto')
    @php
        $user = $block->page->card->user;
        $contact = $user->contact;
    @endphp
    <div class="row mb-1 aligns-items-center justify-content-center">
        @if($content['showimage'] == 'profile')
            <img src="{{ $contact->profile ? $contact->profile->fileUrl() : $contact->noimage  }}">
        @elseif($content['showimage'] == 'logo')
            <img src="{{ $contact->logo ? $contact->logo->fileUrl() : $contact->noimage  }}">
        @endif
    </div>

@elseif($block->type == 'socialmedia')
    @php
        $user = $block->page->card->user;
        $contact = $user->contact;
    @endphp
    <div class="row mb-1 justify-content-center align-items-center">
    @if($content['show_social'])
        @foreach($content['show_social']['show_social'] as $social)
            <a style="width:80px" target="_blank" href="{{ $contact->$social }}"><img class="rounded p-1" src="{{ asset('images/social/'. $social .'.png') }}" style="width:80px !important; height:80px !important"></a>
        @endforeach
    @endif
    </div>

@elseif($block->type == 'reachmeonline')
    @php
        $user = $block->page->card->user;
        $contact = $user->contact;
    @endphp
    <div class="row mb-1 justify-content-center align-items-center">
        <h4 class="text-center headerColor-{{ $design_id }}">Reach Me Online</h4>
    @if($content['show_reach'])
        @foreach($content['show_reach']['show_reach'] as $social)
            <a style="width:80px" target="_blank" href="{{ $contact->$social }}"><img class="rounded p-1" src="{{ asset('images/social/'. $social .'.png') }}" style="width:80px !important; height:80px !important"></a>
        @endforeach
    @endif
    </div>




@endif
