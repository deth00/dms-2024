<div>
    <div class="row">
        <div class="col-12">
            <div class="mails card-box">

                <div class="table-detail mail-right">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="btn-toolbar mt-4" role="toolbar">
                                <div class="btn-group mr-2">
                                    <a href="{{route('inbox')}}" type="button" class="btn btn-primary waves-effect waves-light"><i
                                            class="fa fa-inbox"></i></a>
                                    <a href="{{route('outbox')}}" type="button" class="btn btn-primary waves-effect waves-light"><i
                                            class="fas fa-envelope"></i></a>
                                    <a href="{{route('sent')}}" type="button" class="btn btn-primary waves-effect waves-light"><i
                                            class="fas fa-envelope-open-text"></i></a>
                                    <a href="{{route('bookmark')}}" type="button" class="btn btn-primary waves-effect waves-light"><i
                                            class="fa fa-star"></i></a>
                                    <a href="{{route('trash')}}" type="button" class="btn btn-primary waves-effect waves-light"><i
                                            class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box mt-4">
                                <div class="">
                                    <!-- <form> -->
                                        <div class="form-group" wire:ignore>
                                            <select class="form-control select2-multiple" multiple="multiple"
                                                data-placeholder="ສົ່ງເຖິງ" id="inbox">
                                                @foreach ($users as $item)
                                                    <option value="{{$item['id']}}">{{$item['emp_name']}} ({{$item['departname']}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="email" class="form-control" placeholder="Cc">
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="ຫົວຂໍ້" wire:model="subject">
                                        </div>
                                        <div class="form-group" wire:ignore>
                                            <div>
                                                <textarea name="note" id="note" class="summernote">
                                    
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group" wire:ignore>
                                                <p>ຟາຍເອກະສານ</p>
                                                <input type="file" class="filestyle" wire:model="file">
                                                <div wire:loading wire:target="file">ອັບໂຫຼດ...</div>
                                            </div>
                                            @error('file') <span style="color: red" class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="btn-toolbar form-group mb-0">
                                            <div class="text-right">
                                                <button class="btn btn-purple waves-effect waves-light" wire:click="store">
                                                    <span>ສົ່ງ</span> <i class="fas fa-paper-plane ml-2"></i>
                                                </button>
                                            </div>
                                        </div>

                                    <!-- </form> -->
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- End row -->

                </div>
                <!-- table detail -->
            </div>
            <!-- end table box -->

        </div>
        <!-- mails -->
    </div>
</div>
<!-- end row -->
</div>

@push('scripts')
<!-- Summernote css -->
<link href="{{asset('backend/assets/libs/summernote/summernote-bs4.css')}}" rel="stylesheet" type="text/css">
<!--Summernote js-->
<script src="{{asset('backend/assets/libs/summernote/summernote-bs4.min.js')}}"></script>
<!-- Init js-->
<script src="{{asset('backend/assets/js/pages/email-compose.init.js')}}"></script>

<script>
    $(function() {
        $("#inbox").select2({
            width: 'resolve'
        });
        $('#inbox').on('change', function(e) {
            var data = $('#inbox').select2("val");
            @this.set('user_id', data);
        });
    });
    $('#note').summernote({
      placeholder: 'ເນື້ອໃນ',
      height: 300,
      callbacks:{
        onChange: function(contents, $editable){
          @this.set('note', contents);
        }
      }
    });
</script>
@endpush
