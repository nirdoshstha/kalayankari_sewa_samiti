 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var swiper = new Swiper(".mainSlider", {
            effect: 'fade',
            loop: true,
            autoplay: {
                delay: 2000,
            },
            speed: 2000,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
        });
        var swiper = new Swiper(".awardSlider", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            speed: 1000,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
        var swiper = new Swiper(".testi", {
            slidesPerView: 1,
            spaceBetween: 40,
            centeredSlides: true,
            loop: true,
            speed: 2000,
            grabCursor: true,
            autoplay: {
                delay: 8000,
                disableOnInteraction: false,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
    </script> 
    <script>
     $(document).on("submit", "form.main_form", function (e) {
        e.preventDefault();
        let button = $(this).find("button[type=submit]");
        let current = $(this);
        button.prop("disabled", true).html(`<div class="spinner-border spinner-border-sm"></div> Saving...`);
        if (typeof CKEDITOR !== 'undefined') {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        }
        let route = $(this).attr('action');
        let method = $(this).attr('method');
        let data = new FormData(this);
        $.ajax({
            url: route,
            data: data,
            method: method,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (res) {
                $('span.text-danger').remove();
                
                button.prop("disabled", false).html(`<i class="fas fa-check"></i> Saved`);
                if (res.success_message) {
                    successAlert(res.success_message)
                   
                    $('#success_message').text(res.success_message);
                     
                     $(".main_form").find('input,textarea').val(''); 

                    if(res.reload==true){
                        window.location.href = res.url;
                    }
                      
                    // $('.modal').each(function(){
                    //     $(this).modal('hide');
                    // });
                    // location.reload();

                } if(res.error_message) {
                    errorAlert(res.error_message)
                    window.location.href = res.url;
                }
            },
            error: function (err) {
                button.prop("disabled", false).html(`<i class="fa fa-close"></i> Error`);
                $('span.text-danger').remove();
                location.reload();
                
                if (err.responseJSON.message) {
                    errorAlert(err.responseJSON.message);
                    $('#error_msg').text(err.responseJSON.message);//to show error message in page.
                }
                if (res.error_message) {
                    window.location.href = res.url;//after
                }
                if (err.responseJSON.errors) {
                    $.each(err.responseJSON.errors, function (key, value) {
                        let splitted_key = key.split('.');
                        if (splitted_key.length > 1) {
                            $("<span class='text-danger'>" + value + "<br></span>").insertAfter($("[name='" + splitted_key[0] + "[]']")[splitted_key[1]]);
                        }
                        $('#' + key).after("<span class='text-danger'>" + value + "<br></span>");
                        current.find('#' + key + '_error').after("<span class='text-danger'>" + value + "<br></span>");
                        // current.find('#' + splitted_key[0]+'_error').after("<span class='text-danger'>" + value + "<br></span>");
                    });
                }
            },
        });
    });

    
function successAlert(title = 'Saved!') {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: title,
    })
}

function errorAlert(title = 'Failed!') {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'error',
        title: title,
    })
}
    </script>

     <script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHA_KEY') }}"></script>

 <script type="text/javascript">
 $(document).ready(() => {

 grecaptcha.ready(function() {
            grecaptcha.execute("{{ env('GOOGLE_RECAPTCHA_KEY') }}", {action: 'submit'}).then(function(token) {
                $('.main_form').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
            });
        });

 });
</script>
 @stack('js')
    
 