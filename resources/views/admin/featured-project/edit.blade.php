@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.featured-project.actions.edit', ['name' => $featuredProject->title]))

@section('body')

    <div class="container-xl">
        <div class="card">
            <featured-project-form
                :action="'{{ $featuredProject->resource_url }}'"
                :data="{{ $featuredProject }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.featured-project.actions.edit', ['name' => $featuredProject->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.featured-project.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </featured-project-form>

        </div>

</div>

@endsection
