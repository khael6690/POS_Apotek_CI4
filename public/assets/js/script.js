var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

$(function () {
    // The Calender
    $('#calendar').datetimepicker({
        format: 'L',
        inline: true
    })
})


// previewImage
function previewImage() {
    const images = document.querySelector('#img')
    const img_preview = document.querySelector('.img_preview')
    const file_img = new FileReader()
    file_img.readAsDataURL(images.files[0])
    file_img.onload = function (e) {
        img_preview.src = e.target.result
    }
}


//function detail 
function detail(id) {
    const tujuan = window.location.pathname + `-detail`;
    $.ajax({
        url: tujuan,
        type: "post",
        data: {
            id: id
        },
        success: function (response) {
            $('#data_detail').html(response)
        }
    })
}
