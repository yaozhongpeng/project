@extends('Admin.AdminPublic.adminpublic')
@section('admin')

                    <div class="mws-tabs ui-tabs ui-widget ui-widget-content ui-corner-all">

                        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tab-1" aria-labelledby="ui-id-2" aria-selected="true"><a href="#tab-1" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">Tab 1</a></li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tab-2" aria-labelledby="ui-id-3" aria-selected="false"><a href="#tab-2" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">Tab 2</a></li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tab-3" aria-labelledby="ui-id-4" aria-selected="false"><a href="#tab-3" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4">Tab 3</a></li>
                        </ul>
                        
                        <div id="tab-1" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultrices tempus tortor eget malesuada. Nunc ac euismod nisi. Pellentesque interdum bibendum enim ut accumsan. Cras fermentum tincidunt aliquet. Fusce pretium bibendum justo, et tristique risus sagittis id. Vivamus posuere, velit sit amet blandit tincidunt, leo felis porttitor diam, a vulputate ante lectus sed ipsum. In consequat, orci quis auctor viverra, dolor nisl lacinia lectus, ac placerat sapien erat volutpat sapien. Aliquam vel purus augue, et ultrices ante. Vestibulum eget mi lacus. Suspendisse vel erat elit. Quisque nibh orci, auctor vitae consectetur ornare, vestibulum eget urna. Vivamus lacinia molestie urna non posuere. Nam ipsum dui, pulvinar tincidunt convallis eget, facilisis ut felis.</p>
                        </div>
                        
                        <div id="tab-2" aria-labelledby="ui-id-3" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" style="display: none;" aria-expanded="false" aria-hidden="true">
                            <p>Praesent eu mauris ac felis molestie dictum. Sed volutpat ullamcorper iaculis. Praesent sed accumsan massa. Donec molestie vulputate massa vitae viverra. Nulla vitae hendrerit urna. Ut sit amet lectus non nunc venenatis vehicula et ut justo. Phasellus varius quam eu felis feugiat non consequat magna fermentum. Pellentesque consequat risus non est aliquam eu consectetur dui laoreet. Aliquam turpis est, aliquam non pellentesque ac, volutpat id nisi.</p>
                        </div>
                        
                        <div id="tab-3" aria-labelledby="ui-id-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" style="display: none;" aria-expanded="false" aria-hidden="true">
                            <p>Suspendisse lacinia euismod ligula. Nullam sed est sem, nec sodales erat. Phasellus ipsum orci, scelerisque non faucibus ac, hendrerit ut massa. Praesent ornare justo non turpis convallis sit amet porta urna adipiscing. Donec ac neque non risus tristique commodo non et neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris tincidunt augue vitae risus lacinia sed tempor ligula dapibus. Proin et turpis lacus, eget convallis risus.</p>
                        </div>
                    </div>
              <!-- JavaScript Plugins -->
    <script src="/static/adminSkin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/static/adminSkin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/static/adminSkin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/static/adminSkin/custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="/static/adminSkin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/static/adminSkin/jui/jquery-ui.custom.min.js"></script>
    <script src="/static/adminSkin/jui/js/jquery.ui.touch-punch.js"></script>
    <script src="/static/adminSkin/jui/js/timepicker/jquery-ui-timepicker.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="/static/adminSkin/plugins/imgareaselect/jquery.imgareaselect.min.js"></script>
    <script src="/static/adminSkin/plugins/jgrowl/jquery.jgrowl-min.js"></script>
    <script src="/static/adminSkin/plugins/validate/jquery.validate-min.js"></script>
    <script src="/static/adminSkin/plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="/static/adminSkin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/static/adminSkin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/static/adminSkin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/static/adminSkin/js/demo/demo.widget.js"></script>
@endsection 
@section('title','后台商品列表')