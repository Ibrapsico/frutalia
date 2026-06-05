<footer>
    <div class="footer__container">
        <div class="footer__content">
            <div class="footer__section">
                <x-logo />
            </div>
            

            <div class="footer__section">
                <h4>Contacto</h4>
                <ul>
                    <li><a href="mailto:ftutalia@ejemplo.com">✉️ ftutalia@ejemplo.com</a></li>
                    <li><a href="tel:+34612345678">📞 612 345 678</a></li>
                </ul>
            </div>

            <div class="footer__section">
                <h4>Menú Legal</h4>
                <ul>
                    <li><a href="{{ route('legal.condiciones') }}">Condiciones de uso</a></li>
                    <li><a href="{{ route('legal.cookies') }}">Política de cookies</a></li>
                    <li><a href="{{ route('legal.privacidad') }}">Politica de privacidad</a></li>
                </ul>
            </div>
        </div>
        
        
        <div class="footer__content footer-bottom">
            <ul class="footer-bottom__ul" >
                <li>© {{ date('Y') }} Todos los derechos reservados.</li>
                <li class="footer-bottom__ul--bordes"><span class="negrita">FP DAW</span> - IES A.G. Linares</li>
                <li>Diseñano por <span class="negrita">Ibragim Guzelkhanov Kazavov</span></li>
            </ul>        
        </div>

    </div>
</footer>