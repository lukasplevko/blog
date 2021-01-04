@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.post.actions.edit', ['name' => $post->title]))

@section('body')

    <div class="container-xl">

        <post-form :action="'{{ $post->resource_url }}'" :data="{{ $post->toJson() }}" v-cloak inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-pencil"></i>
                                {{ trans('admin.post.actions.edit', ['name' => $post->title]) }}
                            </div>
                            <div class="card-body">
                                @include('brackets/admin-ui::admin.includes.media-uploader', [
                                'mediaCollection' => app(App\Models\Post::class)->getMediaCollection('thumbnail'),
                                'media' => $post->getThumbs200ForCollection('thumbnail'),
                                'label' => 'Thumbnail'
                                ])
                                <br><br>
                                @include('admin.post.components.form-elements')
                                @include('brackets/admin-ui::admin.includes.media-uploader', [
                                'mediaCollection' => app(App\Models\Post::class)->getMediaCollection('gallery'),
                                'media' => $post->getThumbs200ForCollection('gallery'),
                                'label' => 'Gallery'
                                ])
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-4">
                        @include('admin.post.components.form-elements-right', ['showHistory' => true])
                    </div>
                </div>

                <button type="submit" class="btn btn-primary fixed-cta-button button-save" :disabled="submiting">
                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-save'"></i>
                    {{ trans('brackets/admin-ui::admin.btn.save') }}
                </button>

                <button type="submit" style="display: none" class="btn btn-success fixed-cta-button button-saved"
                    :disabled="submiting" :class="">
                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-check'"></i>
                    <span>{{ trans('brackets/admin-ui::admin.btn.saved') }}</span>
                </button>

            </form>

        </post-form>


    </div>

@endsection
