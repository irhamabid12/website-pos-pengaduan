    $(document).ready(function() {
      searchData();
      $('#search').keyup(function () {
          var strcari = $('#search').val();
          if(strcari != "") {
              $.ajax({
                type: "get",
                url: "{{ url('search') }}",
                data: "keyword=" +strcari,
                success: function (data) {
                  $('tbody').html(data);
                  $('.pagination').hide();
                }
              });
          } else {
            searchData();
            $('.pagination').show();
          }
      });
    });

    function searchData() {
    $.get("{{ url('read') }}", {},
      function (data, status) {
        $('tbody').html(data);
      });
    }