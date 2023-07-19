@extends('admin.layouts.app')

@push('style')
    <style>
        .image-upload .thumb .avatar-edit label{
            line-height: 35px;
            font-size: 14px;
        }
        .oldImage{
            display: none;
        }
        .image-upload .thumb .profilePicPreview{
            height: 360px;
        }
        .editImage {
            height: 360px;
            width: 100%;
        }
        .slow .toggle-group { transition: left 1s; -webkit-transition: left 1s; }
    </style>
@endpush

@push('breadcrumb-plugins')
    <button type="button" class="btn btn-sm btn--primary box--shadow1 text--small addLocation">
        <i class="fa fa-fw fa-plus"></i>
        @lang('Add New')
    </button>
@endpush

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('S.N.')</th>
                                    <th>@lang('Location')</th>
                                    <th>@lang('Property')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($locations as $location)
                                    <tr>
                                        <td data-label="@lang('S.N.')">{{ $locations->firstItem() + $loop->index }}</td>
                                        <td data-label="@lang('Location')">{{ ($location['name']) }}
                                        </td>
                                        <td data-label="@lang('Property')">{{ count($location['properties']) }}</td>
                                        <td data-label="@lang('Status')">
                                            @if($location['status'] == 1)
                                                <span class="badge badge--success">@lang('Active')</span>
                                            @else
                                                <span class="badge badge--warning">@lang('Inactive')</span>
                                            @endif
                                        </td>
                                        <td data-label="@lang('Action')">
                                            <button class="icon-btn editLocation"
                                                data-id="{{ $location['id'] }}" data-name="{{ $location['name'] }}"
                                                data-image="{{ getImage(imagePath()['location']['path'].'/'. $location['image'], imagePath()['location']['size'])}}"
                                                data-status="{{ $location['status'] }}">
                                                <i class="la la-pen"></i></i>
                                            </button>
                                            <button class="icon-btn deleteLocation"
                                                data-id="{{ $location['id'] }}">
                                                <i class="la la-trash"></i></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{ paginateLinks($locations) }}
                </div>
            </div>
        </div>
    </div>

    {{-- Location model --}}
    <div id="locationModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                            <div class="form-group">
                                <label>@lang('Name')<span class="text-danger">*</span></label>
                                <div class="input-group has_append">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="@lang('Enter your location')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">@lang('Image')</label>
                                <div class="oldImage">
                                    <img src="" class="editImage">
                                    <div class="text-center my-2">
                                        <button class="btn btn--danger btn-block btn-lg removeIt">@lang('Remove It')</button>
                                    </div>
                                </div>
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview" style="background-image: url({{ getImage('/', imagePath()['location']['size']) }})">
                                                <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload" name="image" id="locaton-image" accept=".png, .jpg, .jpeg">
                                            <label for="locaton-image" class="bg--success">@lang('Upload Image')</label>
                                            <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg'), @lang('jpg').</b> </small>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="old_image">
                            </div>
                            <div class="form-group statusGroup">
                                <label>@lang('Status')</label>
                                <input type="checkbox" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="@lang('Active')" data-off="@lang('Inactive')" data-width="100%" name="status" id="status" value="">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--success">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="locationDelModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <h5 class="text-center">Are you sure you want to delete <b id="locationName"></b> ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        (function ($) {
            "use strict";
            $('.addLocation').click(function(){
                var modal = $('#locationModal');
                var action = `{{ route('admin.location.store') }}`;
                modal.find('.modal-title').text("@lang('Add Location')");
                modal.find('.statusGroup').hide();
                modal.find('form').attr('action', action);
                $('.image-upload').css('display', 'block');
                modal.modal('show');
            })

            $('.editLocation').click(function () {
                var data = $(this).data();
                var modal = $('#locationModal');
                var action = `{{ route('admin.location.update', '') }}/${data.id}`;
                modal.find('.modal-title').text("@lang('Update Location')");
                modal.find('.statusGroup').show();
                modal.find('[name=name]').val(data.name);
                modal.find('form').prepend('<input type="hidden" name="_method" id="_method" value="PUT">');
                if(data.status == 1){
                    modal.find('[name=status]').bootstrapToggle('on');
                }else{
                    modal.find('[name=status]').bootstrapToggle('off');
                }
                modal.find('.editImage').attr('src', data.image);
                modal.find('[name=old_image]').val(data.image);

                $('.oldImage').css('display', 'block');
                $('.image-upload').css('display', 'none');
                modal.find('form').attr('action', action);
                modal.modal('show')
            })

            $('.deleteLocation').click(function(){
                var data = $(this).data();
                var modal = $('#locationDelModal');
                var action = `{{ route('admin.location.delete', '') }}/${data.id}`;
                modal.find('.modal-title').text("@lang('Delete Location')");
                modal.find('form').attr('action', action);
                modal.modal('show');
            });

            $('.removeIt').click(function(e){
                e.preventDefault();
                $('[name=old_image]').val('');
                $('.image-upload').css('display', 'block');
                $('.oldImage').css('display', 'none');
            });

            $('#locationModal').on('hidden.bs.modal', function () {
                $('#locationModal form')[0].reset();
                $('.profilePicPreview').css('background-image', 'url({{ getImage('/', imagePath()['location']['size']) }})');
                $('.oldImage').css('display', 'none');
                $(this).find('#_method').remove();
            });

            $('#status').change(function(){
                if($(this).prop("checked") == true){
                    $(this).val(1);
                }else{
                    $(this).val(0);
                }
            });

        })(jQuery);
    </script>
@endpush
