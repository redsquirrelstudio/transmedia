<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.featured-project.columns.title') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}"
               id="title" name="title" placeholder="{{ trans('admin.featured-project.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}
        </div>
    </div>
</div>


<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.featured-project.columns.user_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="user" label="name" :options="{{ \App\Models\User::all()->toJson() }}"
                     track-by="id" placeholder="Select a student" :searchable="true"></multiselect>
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.featured-project.columns.description') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description"
                     :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('description') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center">
    <div class="col-md-1 col-xl-2"></div>
    <div class="col-md-9 col-xl-8">
        @include('brackets/admin-ui::admin.includes.media-uploader', [
                            'mediaCollection' => app(App\Models\FeaturedProject::class)->getMediaCollection('banners'),
                            'media' => isset($featuredProject) ? $featuredProject->getThumbs200ForCollection('banners') : null,
                            'label' => 'Banner'
                        ])
    </div>
</div>

<div class="form-group row align-items-center">
    <div class="col-md-1 col-xl-2"></div>
    <div class="col-md-9 col-xl-8">
        @include('brackets/admin-ui::admin.includes.media-uploader', [
                                    'mediaCollection' => app(App\Models\FeaturedProject::class)->getMediaCollection('thumbnails'),
                                    'media' => isset($featuredProject) ? $featuredProject->getThumbs200ForCollection('thumbnails') : null,
                                    'label' => 'Images'
                                ])
    </div>
</div>


<div class="form-group row align-items-center mt-4"
     :class="{'has-danger': errors.has('youtube_url'), 'has-success': fields.youtube_url && fields.youtube_url.valid }">
    <label for="youtube_url" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.featured-project.columns.youtube_url') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.youtube_url" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('youtube_url'), 'form-control-success': fields.youtube_url && fields.youtube_url.valid}"
               id="youtube_url" name="youtube_url"
               placeholder="{{ trans('admin.featured-project.columns.youtube_url') }}">
        <div v-if="errors.has('youtube_url')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('youtube_url') }}
        </div>
    </div>
</div>


