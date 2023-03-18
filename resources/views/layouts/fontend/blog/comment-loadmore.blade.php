@foreach ($blogcomments as $blogcomment)
    <div class="col-md-2 col-sm-2">
        <img src="{{ $blogcomment->relationWithUser->image }}" alt="Responsive image" class="img-rounded img-responsive">
    </div>
    <div class="col-md-10 col-sm-10 blog-comments outer-bottom-xs">
        <div class="blog-comments inner-bottom-xs">
            <h4>{{ $blogcomment->relationWithUser->name }}</h4>
            <span class="review-action pull-right">
                    {{ $blogcomment->created_at->diffForHumans() }}
            </span>
            <p>{!! $blogcomment->comment !!}</p>
        </div>

        @php
            $replies = App\Models\BlogcommentReply::where('blogcomment_id', $blogcomment->id)->get();
        @endphp

        <div class="blog-comments-responce outer-top-xs ">
            <div class="row">
                @foreach ($replies as $reply)
                <div class="col-md-2 col-sm-2">
                    <img src="{{ asset($reply->relationWithUser->image) }}" class="img-rounded img-responsive">
                </div>
                <div class="col-md-10 col-sm-10 outer-bottom-xs">
                    <div class="blog-sub-comments inner-bottom-xs">
                        <h4>{{ $reply->relationWithUser->name }}</h4>
                        {{-- <span class="review-action pull-right">
                            03 Day ago &sol;
                            <a href="#"> Repost</a> &sol;
                            <a href="#"> Reply</a>
                        </span> --}}
                        <p>{!! $reply->description !!}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endforeach
