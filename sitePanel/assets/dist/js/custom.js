$(document).ready(function() {

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      localStorage.setItem('lastTab', $(this).attr('href'));
     });
     var lastTab = localStorage.getItem('lastTab');
     if (lastTab) {
      $('[href="' + lastTab + '"]').tab('show');
    }

    $(".btn-delete").on('click', function () {
        var $data_url = $(this).data("url");	
        Swal.fire({
            title: 'Emin misin?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText : 'Hayır Silme',
            confirmButtonText: 'Evet , Sil !'
          }).then((result) => {
            if (result.isConfirmed) {
                if (result.value) {
                    window.location.href = $data_url;
                }
                Swal.fire(
                  'Silindi!',
                  'Silme işlemi gerçekleşti.',
                  'success'
                )
            }
          })
    });
})