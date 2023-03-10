<script src="{{ asset('js/jquery1-3.4.1.min.js') }}"></script>

<script src="{{ asset('js/popper1.min.js') }}"></script>

<script src="{{ asset('js/bootstrap1.min.js') }}"></script>

<script src="{{ asset('js/metisMenu.js') }}"></script>

<script src="{{ asset('vendors/count_up/jquery.waypoints.min.js') }}"></script>

<script src="{{ asset('vendors/chartlist/Chart.min.js') }}"></script>

<script src="{{ asset('vendors/count_up/jquery.counterup.min.js') }}"></script>

<script src="{{ asset('vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>

<script src="{{ asset('vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendors/datatable/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('vendors/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('vendors/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendors/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('vendors/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendors/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendors/datatable/js/ellipsis.js') }}"></script>
<script src="{{ asset('js/chart.min.js') }}"></script>

<script src="{{ asset('vendors/progressbar/jquery.barfiller.js') }}"></script>

<script src="{{ asset('vendors/text_editor/summernote-bs4.js') }}"></script>
<script src="{{ asset('vendors/am_chart/amcharts.js') }}"></script>

<script src="{{ asset('vendors/scroll/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('vendors/scroll/scrollable-custom.js') }}"></script>
<script src="{{ asset('vendors/chart_am/core.js') }}"></script>
<script src="{{ asset('vendors/chart_am/charts.js') }}"></script>
<script src="{{ asset('vendors/chart_am/animated.js') }}"></script>
<script src="{{ asset('vendors/chart_am/kelly.js') }}"></script>
<script src="{{ asset('vendors/chart_am/chart-custom.js') }}"></script>

<script
  src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
  integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>
@include('sweetalert::alert')
@livewireScripts

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
</script>

<script src="{{ asset('js/custom.js') }}"></script>

@stack('js')
