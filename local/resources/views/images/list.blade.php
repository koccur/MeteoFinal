@extends('layouts.master')
@section('content')
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
        <!-- The modal dialog, which will be used to wrap the lightbox content -->
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body next"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left prev">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            Previous
                        </button>
                        <button type="button" class="btn btn-primary next">
                            Next
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="links">
        @foreach($images as $image)
            <a href="{{asset($image->file)}}" data-gallery>
                <img src="{{asset($image->destination_path.'thumb/'.$image->filename)}}" />
            </a>

            <div class="caption">
                <h3>{{$image->caption}}</h3>
                <p>{!! substr($image->description, 0,100) !!}</p>
                <p>
                <div class="row text-center" style="padding-left:1em;">
                    <span class="pull-left">&nbsp;</span>
                </div>
            </div>
        @endforeach
    </div>
@stop