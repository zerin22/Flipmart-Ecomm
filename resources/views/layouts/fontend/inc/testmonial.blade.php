@php
    $adminProfiles = \App\Models\User::first();
@endphp
<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
    <div id="advertisement" class="advertisement">
        <div class="item">
            <div class="avatar"><img src="{{ (!empty($adminProfiles->image) ? asset($adminProfiles->image) : asset('backend/images/default/profile_img.png')) }} " alt="Image"></div>
            <div class="testimonials">{!! (!empty($adminProfiles->relationWithAdminBio->bio) ? ($adminProfiles->relationWithAdminBio->bio) : ('No Data!')) !!}</div>
            <div class="clients_author">{{ (!empty($adminProfiles->name) ? ($adminProfiles->name) : ('No Data!')) }}	<span><strong> Company: </strong>{{ (!empty($adminProfiles->relationWithAdminBio->company_name) ? ($adminProfiles->relationWithAdminBio->company_name) : ('No Data!')) }}</span>	</div>
        </div>
    </div>
</div>
