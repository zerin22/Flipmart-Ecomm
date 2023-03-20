@php
    $adminProfiles = \App\Models\AdminBio::first();
@endphp
<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
    <div id="advertisement" class="advertisement">
        <div class="item">
            <div class="avatar"><img src="{{ (!empty($adminProfiles->relationWithUser->image) ? asset($adminProfiles->relationWithUser->image) : asset('backend/images/default/profile_img.png')) }} " alt="Image"></div>
            <div class="testimonials">{!! (!empty($adminProfiles->bio) ? ($adminProfiles->bio) : ('No Data!')) !!}</div>
            <div class="clients_author">{{ (!empty($adminProfiles->relationWithUser->name) ? ($adminProfiles->relationWithUser->name) : ('No Data!')) }}	<span><strong> Company: </strong>{{ (!empty($adminProfiles->company_name) ? ($adminProfiles->company_name) : ('No Data!')) }}</span>	</div>
        </div>
    </div>
</div>
