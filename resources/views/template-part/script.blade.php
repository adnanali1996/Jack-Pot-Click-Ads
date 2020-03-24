
<!-- JavaScripts -->
<script src="{{url('/')}}/assets/admin_assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/js.cookie.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/app.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/layout.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/jquery.counterup.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/datatable.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/datatables.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/datatables.bootstrap.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/table-datatables-buttons.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/bootstrap-modalmanager.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/bootstrap-modal.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/admin_assets/js/bootstrap-toggle.min.js"></script>
<script src="{{url('/')}}/assets/font_awesome/js/fontawesome-iconpicker.js"></script>
<script src="{{url('/')}}/assets/font_awesome/js/fontawesome-iconpicker.min.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
    (function ($) {
        $(window).on('load',function(){
            var preLoder = $(".preloader");
            preLoder.fadeOut(1000);
        });
    }(jQuery));
</script>
<script type="text/javascript" src="{{asset('assets/admin_assets/nicedit.js')}}"></script>
<script>
    $('.demo').iconpicker();

</script>
<script>
    $('.demo').iconpicker({

        // Popover title (optional) only if specified in the template
        title: false,

        // use this value as the current item and ignore the original
        selected: false,

        // use this value as the current item if input or element value is empty
        defaultValue: false,

        // (has some issues with auto and CSS). auto, top, bottom, left, right
        placement: 'bottom',

        // If true, the popover will be repositioned to another position when collapses with the window borders
        collision: 'none',

        // fade in/out on show/hide ?
        animation: true,

        // hide iconpicker automatically when a value is picked.
        // it is ignored if mustAccept is not false and the accept button is visible
        hideOnSelect: false,

        // show footer
        showFooter: false,

        // If true, the search will be added to the footer instead of the title
        searchInFooter: false,

        // only applicable when there's an iconpicker-btn-accept button in the popover footer
        mustAccept: false,

        // Appends this class when to the selected item
        selectedCustomClass: 'bg-primary',

        // list of icon classes
        icons: [],

        fullClassFormatter: function(val) {
            return 'fa ' + val;
        },

        // children input selector
        input: 'input,.iconpicker-input',

        // use the input as a search box too?
        inputSearch: false,

        // Appends the popover to a specific element.
        // If not set, the selected element or element parent is used
        container: false,

        // children component jQuery selector or object, relative to the container element
        component: '.input-group-addon,.iconpicker-component',

        // Plugin templates:
        templates: {
            popover: '<div class="iconpicker-popover popover"><div class="arrow"></div>' +
            '<div class="popover-title"></div><div class="popover-content"></div></div>',
            footer: '<div class="popover-footer"></div>',
            buttons: '<button class="iconpicker-btn iconpicker-btn-cancel btn btn-default btn-sm">Cancel</button>' +
            ' <button class="iconpicker-btn iconpicker-btn-accept btn btn-primary btn-sm">Accept</button>',
            search: '<input type="search" class="form-control iconpicker-search" placeholder="Type to filter" />',
            iconpicker: '<div class="iconpicker"><div class="iconpicker-items"></div></div>',
            iconpickerItem: '<a role="button" href="#" class="iconpicker-item"><i></i></a>',
        }

    });
</script>
<script>

    /*----------------------------------------
    Upload btn
    ------------------------------------------*/
    var SITE = SITE || {};

    SITE.fileInputs = function() {
        var $this = $(this),
            $val = $this.val(),
            valArray = $val.split('\\'),
            newVal = valArray[valArray.length-1],
            $button = $this.siblings('.btn'),
            $fakeFile = $this.siblings('.file-holder');
        if(newVal !== '') {
            $button.text('Photo Chosen');
            if($fakeFile.length === 0) {
                $button.after('<span class="file-holder">' + newVal + '</span>');
            } else {
                $fakeFile.text(newVal);
            }
        }
    };


    $('.file-wrapper input[type=file]').bind('change focus click', SITE.fileInputs);

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var tmppath = URL.createObjectURL(event.target.files[0]);

            reader.onload = function (e) {
                $('#img-uploaded').attr('src', e.target.result);
                $('input.img-path').val(tmppath);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".uploader").change(function(){
        readURL(this);
    });

</script>
<script type="text/javascript">
    $(document).ready(function(){
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    });
</script>
<script>$( ".datepicker" ).datepicker();</script>



