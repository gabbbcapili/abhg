<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Choose Your Design</h5>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-6">
                        <label>Design</label>
                        <select class="form-control select2" id="selectDesign">
                            @foreach(App\Models\Design::$ui as $design)
                                <option value="{{ $design['group'] }}"
                                @if($card->design_id)
                                {{ $card->design->group == $design['group'] ? 'selected' : '' }}
                                @endif
                                >
                                {{ $design['caption'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="row mb-2">
                    <div class="col-12" id="design_id">

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="swiper-multi-row swiper-container">
                        <div class="swiper-wrapper">
                            @foreach(App\Models\Design::$ui as $media)
                              <div class="swiper-slide">
                                <img class="img-fluid" src="{{ asset('images/ui/' . $media['image']) }}" alt="media" />
                                <div class="h-100">{{ $media['caption'] }}</div>
                              </div>
                            @endforeach
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

