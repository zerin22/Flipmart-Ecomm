@php
    $adminProfiles = \App\Models\AdminBio::first();
@endphp
<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
    <div id="advertisement" class="advertisement">
        <div class="item">
            <div class="avatar"><img src="{{ asset($adminProfiles->relationWithUser->image) }}" alt="Image"></div>
            <div class="testimonials">{!! $adminProfiles->bio !!}</div>
            <div class="clients_author">{{ $adminProfiles->relationWithUser->name }}	<span><strong> Company: </strong>{{ $adminProfiles->company_name }}</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->
    </div><!-- /.owl-carousel -->
</div>
