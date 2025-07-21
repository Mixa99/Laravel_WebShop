@extends('layouts.app')
    
@section('content')
<div class="content-size">
        <header class="about-header-section">
            <h1>Dobrodošli u Svet Tehnologije!</h1>
            <img src="{{ asset('storage/img/about/naslov_slika.jpg') }}" alt="Moderna tehnologija - telefoni, računari, televizori" class="about-header-image">
            <p>Ukoliko tražite najnovije telefone, moćne računarske periferije ili vrhunske televizore, na pravom ste mestu. Razumemo da izbor prave tehnologije može biti izazovan, zato smo tu da vam pružimo ne samo proizvode, već i sveobuhvatnu podršku i savete kako biste doneli najbolju odluku. Naša misija je da vam približimo inovacije i učinimo vaš digitalni život bogatijim i jednostavnijim.</p>
        </header>

        <section class="about-section">
            <h2>Naša Priča</h2>
            <p>Verujemo da tehnologija treba da bude dostupna svima, bez obzira na nivo znanja ili budžet. Zato smo, pre <strong>X</strong> godina, pokrenuli ovu platformu sa željom da postanemo vaša prva stanica za sve što se tiče elektronike. Od samog početka, trudili smo se da izgradimo poverenje sa našim kupcima kroz transparentnost, fer cene i izvanrednu uslugu. Svakim danom se trudimo da budemo bolji i da pratimo trendove kako bismo vam uvek ponudili najaktuelnije i najkvalitetnije proizvode.</p>
        </section>

        <section class="about-section">
            <h2>Šta Nudimo?</h2>
            <div class="section-grid">
                <div class="grid-item">
                    <img src="{{ asset('storage/img/about/telefon_slika.jpg') }}" alt="Pametni telefoni">
                    <h4>Telefoni: Svet u Vašem Džepu</h4>
                    <p>Bilo da vam je potreban najnoviji pametni telefon sa naprednom kamerom, robustan model za svakodnevnu upotrebu ili pristupačan telefon za osnovne potrebe, imamo sve. U našoj ponudi pronaći ćete širok izbor modela renomiranih svetskih brendova. Pratimo najnovije trendove i redovno ažuriramo naš asortiman kako biste uvek imali pristup najnovijim modelima.</p>
                </div>
                <div class="grid-item">
                    <img src="{{ asset('storage/img/about/laptop_slika.jpg') }}" alt="Računarske periferije">
                    <h4>Računarske Periferije: Povećajte Svoju Produktivnost</h4>
                    <p>Od ergonomskih tastatura i preciznih miševa do brzih SSD diskova i moćnih grafičkih kartica, imamo sve što vam je potrebno za optimizaciju vašeg računara. Bez obzira da li ste gejmer, profesionalac ili student, naša ponuda periferija je pažljivo odabrana kako bi vam omogućila maksimalne performanse i udobnost.</p>
                </div>
                <div class="grid-item">
                    <img src="{{ asset('storage/img/about/televozor_slika.jpg') }}" alt="Moderni televizori">
                    <h4>Televizori: Uronite u Svet Zabave</h4>
                    <p>Uživajte u kristalno čistoj slici i bogatom zvuku uz našu široku ponudu televizora. Od pametnih televizora visoke rezolucije do modela idealnih za vaš dnevni boravak, nudimo razne opcije koje će zadovoljiti vaše potrebe za zabavom. Doživite omiljene filmove, serije i sportske događaje kao nikada pre.</p>
                </div>
            </div>
        </section>

        <section class="about-section">
            <h2>Zašto Odabrati Nas?</h2>
            <ul class="usp-list">
                <li><strong>Širok Asortiman:</strong> Pažljivo biramo proizvode kako bismo vam ponudili samo najbolje od proverenih brendova.</li>
                <li><strong>Konkurentne Cene:</strong> Nudimo pristupačne cene i redovne akcije kako biste dobili najbolju vrednost za svoj novac.</li>
                <li><strong>Stručna Podrška:</strong> Naš tim je uvek spreman da vam pomogne oko svih pitanja i nedoumica.</li>
                <li><strong>Sigurna Kupovina:</strong> Vaša sigurnost nam je na prvom mestu. Garantujemo bezbednu i pouzdanu kupovinu.</li>
            </ul>
        </section>
</div>
@endsection
