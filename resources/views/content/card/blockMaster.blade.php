@php
    $content = json_decode($block->content, true);
@endphp
@if($block->type == 'text')
    <div class="row mb-2">
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
    <h4>—SHARE—</h4>
    @foreach($content as $key => $val)
        @if($val)
        <img class="input-group-img" style="width: 60px; height: 45px" src="{{ asset('images/social/'. $key .'.png') }}">
        @endif
    @endforeach
</div>
@elseif($block->type == 'preformattedBtn')
    {!! $content['html'] !!}
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
        {!! $content['headline'] ? $content['headline'] : '' !!}
        @foreach($content['form'] as $key => $val)
            @if($val)
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{ $key }}" id="{{ $key }}" placeholder="{{ $contactForm[$key] }}" readonly="true"/>
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
                            <label for="{{ $key }}">{{ $val['val'] }}</label>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="row mb-2 ">
            <div class="d-grid col-12">
                <button type="button" class="btn btn-outline-secondary">Submit</button>
            </div>
        </div>
    </div>
@elseif($block->type == 'event')
    @php
        $eventRsvpForm = App\Models\Block::$eventRsvpForm;
    @endphp
    <h2 class="text-center">{{ $content['title'] }}</h2>
    <div class="row mb-2">
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2">Start Date:</p>
            <p class="ps-2">{{ Carbon\Carbon::parse($content['startDate'])->format('M d, Y H:i a') }}</p>
        </div>
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2">End Date:</p>
            <p class="ps-2">{{ Carbon\Carbon::parse($content['endDate'])->format('M d, Y H:i a') }}</p>
        </div>
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2">Timezone:</p>
            <p class="ps-2">{{ $content['timezone'] }}</p>
        </div>
        @if($content['venue'])
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2">Venue: </p>
            <p class="ps-2"> {{ $content['venue'] }}</p>
        </div>
        @endif
        @if($content['zip'] || $content['street'] || $content['city'] || $content['state'])
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2">Location:</p>
            <p class="ps-2">{{ $content['street'] }} {{ $content['city'] }} {{ $content['state'] }} {{ $content['zip'] }}</p>
        </div>
        @endif
        @if($content['mapit'])
        <div class="row mb-2 ">
            <div class="d-grid col-12">
                <a target="_blank" href="https://www.google.com/maps?q={{ $content['venue'] }}+{{ $content['street'] }}+{{ $content['city'] }}+{{ $content['state'] }}+{{ $content['zip'] }}" class="btn btn-outline-secondary">Map It</a>
            </div>
        </div>
        @endif
        @if($content['description'])
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2">Description: </p>
            <p class="ps-2"> {{ $content['description'] }}</p>
        </div>
        @endif
        @if($content['tickets'])
        <div class="row mb-2 ">
            <div class="d-grid col-12">
                <a target="_blank" href="{{ $content['tickets'] }}" class="btn btn-outline-secondary">Tickets</a>
            </div>
        </div>
        @endif
        @if($content['register'])
        <div class="row mb-2 ">
            <div class="d-grid col-12">
                <a target="_blank" href="{{ $content['register'] }}" class="btn btn-outline-secondary">Register</a>
            </div>
        </div>
        @endif
        @if($content['webinar'])
        <div class="row mb-2 ">
            <div class="d-grid col-12">
                <a target="_blank" href="{{ $content['webinar'] }}" class="btn btn-outline-secondary">Register for Webinar</a>
            </div>
        </div>
        @endif
        @if($content['webinarInstructions'])
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2">Webinar Instructions: </p>
            <p class="ps-2"> {{ $content['webinarInstructions'] }}</p>
        </div>
        @endif
    </div>
    @if($content['showRsvpForm'])
        <h4 class="text-center">Please RSVP</h4>

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
                    <button type="button" class="btn btn-outline-secondary">Submit</button>
                </div>
        </div>
    @endif
    @if($content['followMe'])
    <div class="row mb-2">
        <div class="d-grid col-12">
          <a class="btn btn-outline-secondary"><span data-feather="users"></span> Follow Me</a>
        </div>
    </div>
    @endif
    @if($content['shareByText'] || $content['shareByEmail'])
    <div class="row mb-2">
        @if($content['shareByText'])
        <div class="d-grid col-6">
          <a class="btn btn-outline-secondary"><span data-feather="file-text"></span> Share By Text</a>
        </div>
        @endif
        @if($content['shareByEmail'])
        <div class="d-grid col-6">
          <a class="btn btn-outline-secondary"><span data-feather="mail"></span> Share By Email</a>
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
        <h2 class="text-center">{{ $content['title'] }}</h2>

        <p>{!! $content['description'] !!}</p>
        @if($content['terms'])
            <div class="d-flex align-items-center">
                <p class="fw-bold ps-2">Terms:</p>
                <p class="ps-2">{{ $content['terms']}}</p>
            </div>
        @endif
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2">Offer:</p>
            <p class="ps-2">{{ Carbon\Carbon::parse($content['startDate'])->format('M d') }} - {{ Carbon\Carbon::parse($content['endDate'])->format('M d') }}</p>
        </div>
        <div class="d-flex align-items-center">
            <p class="fw-bold ps-2">Expiration:</p>
            <p class="ps-2">{{ Carbon\Carbon::parse($content['expires'])->format('M d') }}</p>
        </div>

        @if($content['followMe'])
        <div class="mb-2">
            <div class="d-grid col-12">
              <a class="btn btn-outline-secondary"><span data-feather="users"></span> Follow Me</a>
            </div>
        </div>
        @endif
        @if($content['shareByText'] || $content['shareByEmail'])
            @if($content['shareByText'])
            <div class="d-grid col-6">
              <a class="btn btn-outline-secondary"><span data-feather="file-text"></span> Share By Text</a>
            </div>
            @endif
            @if($content['shareByEmail'])
            <div class="d-grid col-6">
              <a class="btn btn-outline-secondary"><span data-feather="mail"></span> Share By Email</a>
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
                        <span class="fw-bolder">{{ $media->title }}</span>
                        </a>
                        @if($media->caption)
                            <small class="emp_post text-muted">{{ $media->caption }}</small>
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
                    <p class="mt-1 text-center">{{ $media->caption }}</p>
                @endif

            @else
                <video width="320" height="240" controls="controls">
                <source src="{{ $media->fileUrl() }}" type="video/ogg">
                Your browser does not support the video tag.
                </video>
                @if($media->caption)
                    <p class="mt-1 text-center">{{ $media->caption }}</p>
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
                <p class="fw-bolder mt-1 text-center">{{ $media->caption }}</p>
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
                        <div class="h-100 text-center">{{ $media->caption }}</div>
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
            <h4 class="emp_name text-truncate fw-bold">{{ $content['text'] }}</h4>
            <small class="emp_post text-truncate text-muted">{{ $content['subText'] }}</small>
          </div>
        </div>
    </div>



@endif
