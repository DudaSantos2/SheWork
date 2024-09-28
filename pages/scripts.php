<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="//code.jivosite.com/widget/ICF9BG7Crw" async></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://example.com/fontawesome/v6.6.0/js/fontawesome.js" data-auto-replace-svg="nest"></script>

<script>
    $(document).ready(function () {
        $('#telefone').mask('(00) 00000-0000');
        $('#cep').mask('00000-000');
    });
</script>
<script>

    document.addEventListener('DOMContentLoaded', function () {
        var wow = new WOW({
            boxClass: 'wow',        // Class name to trigger animation
            animateClass: 'animated', // Class name for animation
            offset: 0,                // Distance to trigger the animation
            mobile: true,             // Trigger animations on mobile devices
            live: true                // Act on asynchronously loaded content
        });

        function checkVisibility() {
            if (document.visibilityState === 'visible') {
                wow.init(); // Inicia as animações do WOW.js quando a aba é visível
            } else {
                wow.stop(); // Para as animações quando a aba não é visível
            }
        }

        // Verifica a visibilidade da aba
        document.addEventListener('visibilitychange', checkVisibility);

        // Inicia a verificação ao carregar a página
        checkVisibility();
    });
</script>
<script>
    var swiper = new Swiper(".swiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        loop: true,
        speed: 1000,
        slidesPerView: 3,
        slidesPerGroup: 1,

//      autoplay: {
//        delay: 3000, 
//        disableOnInteraction: false, 
//      },
    });
</script>
<script>

    new WOW({
        boxClass: 'wow',      // Classe para ativar a animação (padrão é 'wow')
        animateClass: 'animate__animated', // Classe para definir animação (padrão é 'animate__animated')
        offset: 0,            // Distância para iniciar a animação (padrão é 0)
        mobile: true,         // Ativar animações em dispositivos móveis (padrão é true)
        live: true            // Verificar se há novos elementos animados (padrão é true)
    }).init();


</script>