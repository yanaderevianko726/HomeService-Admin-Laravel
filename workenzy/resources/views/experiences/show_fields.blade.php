<div style="flex: 70%;max-width: 70%;padding: 0 4px;" class="column">
    <!-- E Provider Id Field -->
    <div class="col-12 my-3">
        <span class="text-bold">{{trans('lang.experience_e_provider_id')}}: </span> <span class="mx-3">{!! $experience->eProvider->name !!}</span>
    </div>
    <!-- Title Field -->
    <div class="col-12 my-4">
        <span class="text-bold">{{trans('lang.experience_title')}}: </span> <span class="d-block">{!! $experience->title !!}</span>
    </div>

    <!-- Description Field -->
    <div class="col-12 my-4">
        <span class="text-bold">{{trans('lang.experience_description')}}: </span> <span class="d-block">{!! $experience->description !!}</span>
    </div>
</div>

<div style="flex: 30%;max-width: 30%;padding: 0 4px;" class="bg-light d-block column rounded px-4">
    <!-- Created At Field -->
    <div class="col-12 my-4">
        <span class="text-bold">{{trans('lang.experience')}}: </span> <span class="mx-3">#{!! $experience->id !!}</span>
    </div>
    <!-- Created At Field -->
    <div class="col-12 my-4">
        <span class="text-bold">{{trans('lang.experience_created_at')}}: </span> <span class="d-block">{!! getDateColumn($experience,'created_at') !!}</span>
    </div>
    <!-- Updated At Field -->
    <div class="col-12 my-4">
        <span class="text-bold">{{trans('lang.experience_updated_at')}}: </span> <span class="d-block">{!! getDateColumn($experience) !!}</span>
    </div>
</div>


