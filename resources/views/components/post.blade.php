<div class="col-md-6 col-lg-4">
    <div class="rotating-card-container manual-flip" style="height: 328.875px; margin-bottom: 30px;">
        <div class="card card-rotate">
            <div class="front truncate" style="min-height: 328.875px;">
                <div class="card-content">
                    <h5 class="category-social text-success">
                        <i class="fa fa-newspaper-o"></i> {{ $post->job_title }}
                    </h5>
                    <h4 class="card-title">
                        <a href="#pablo">
                            {{ $languages }}
                        </a>
                    </h4>
                    <p class="card-description">
                        {{ $post->location }}
                    </p>
                    <div class="footer" style="display: flex; align-items: center; justify-content: space-between">
                        @isset($company)
                            <div class="author">
                                <a href="#pablo">
                                    <img src="{{$company->logo}}" class="avatar img-raised">
                                    <span>{{$company->name}}</span>
                                    <div class="ripple-container">
                                        <div class="ripple ripple-on ripple-out"
                                             style="left: 1131px; top: 16561px; background-color: rgb(60, 72, 88); transform: scale(12.75);">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
