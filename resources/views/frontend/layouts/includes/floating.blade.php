<section class="floating">
    <ul>
        <li><a href="tel:{{$contactdetail->contact_number}}" target="_blank"><i class="fa-solid fa-phone"></i></a></li>
        <li><a href="viber://chat?number={{$contactdetail->contact_number}}" target="_blank"><i class="fa-brands fa-viber"></i></a></li>
        <li><a href="https://api.whatsapp.com/send?phone={{$contactdetail->contact_number}}" target="_blank"><i
                    class="fa-brands fa-whatsapp"></i></a></li>
    </ul>
</section>
