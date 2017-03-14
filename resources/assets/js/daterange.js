    $(".select2").select2();
    $('#reservation').daterangepicker({
      locale: {
      format: 'YYYY-MM-DD'
      },
    });
    //Date range picker with time picker
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
          
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        }
    );